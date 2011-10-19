all:
	@echo "Run 'make imageoptim' to losslessly optimise all images"
	@echo "Run 'make minaccept' to run the quick pre-commit tests"
	@echo "Run 'make checksignoff' to check that your commits are all Signed-off-by"
	@echo "Run 'make push' to push your changes to the repo"

imageoptim:
	find . -iname '*.png' -exec optipng -o7 -q {} \;
	find . -iname '*.gif' -exec gifsicle -O2 -b {} \;
	find . -iname '*.jpg' -exec jpegoptim -q -p --strip-all {} \;
	find . -iname '*.jpeg' -exec jpegoptim -q -p --strip-all {} \;

branch := $(GERRIT_REFSPEC)
ifeq (, $(branch))
branch := $(shell bash -c "git branch | grep \* | sed -e 's/ *\* *//'" )
endif

ifeq ("(no branch)", "$(branch)")
remote := origin
else
remote := $(shell bash -c "git config --get branch.$(branch).remote" )
endif

ifeq (".", "$(remote)")
remote := origin
endif
ifeq ("", "$(remote)")
remote := origin
endif

commitid := $(shell bash -c "git merge-base $(remote)/1.4_STABLE HEAD")

minaccept:
	@echo "Running minimum acceptance test..."
	@find htdocs/ -type f -name "*.php" | xargs -n 1 -P 2 php -l > /dev/null && echo All good!
	@if git rev-parse --verify HEAD 2>/dev/null; then git diff-index -p -M --cached $(commitid) -- ; fi | test/coding-standard-check.pl

checksignoff:
	@branch=`git status | head -1 | sed 's/.* On branch //'`; \
	commits=`git log origin/$$branch.. | grep "^commit" | wc -l`; \
	signed=`git log origin/$$branch.. | grep "Signed-off-by: " | wc -l`; \
	if test "$$commits" -ne "$$signed"; then \
		echo "$$(($$commits - $$signed)) commit(s) on $$branch not signed off ($$signed/$$commits)"; \
		false; \
	else \
		echo "All commits signed!"; \
	fi

push: minaccept checksignoff
	if test -z "$(TAG)"; then \
		git push gerrit HEAD:refs/for/1.4_STABLE; \
	else \
		git push gerrit HEAD:refs/for/1.4_STABLE/$(TAG); \
	fi
