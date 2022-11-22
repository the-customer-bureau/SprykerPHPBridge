# SprykerPHPBridge
## A PHP wrapper for the Spryker Glue API.

> Written in PHP using [Gacela](https://github.com/gacela-project/gacela)

### Q. So what does this do and why is it useful?

A. This package allows you to easily interact with the Spryker Glue API in your 3rd party PHP Application.

### Q. So... erm... why? Why not just use Spryker...? It's already a great PHP application!

A. Well we know...! But this package allows you to use Spryker data in any PHP Application...!


### Installation (once published on packagist.org)

```bash
composer require engineered/sprykerphpbridge
```

### Example

For a full example [see here](example/full_example.php).

```php

<?php

require __DIR__ . '/vendor/autoload.php';

// Change YOUR_GLUE_URL to something like: 'https://glue.de.b2c.demo-spryker.com'
$sprykerBridge = SprykerBridge::create(YOUR_GLUE_URL);

// get the category trees

$categoryTress = $sprykerBridge->category()->getTrees();

```
```json
//outputs

{
    "data": [
        {
            "type": "category-trees",
            "id": null,
            "attributes": {
                "categoryNodesStorage": [
                    {
                        "nodeId": 5,
                        "order": 100,
                        "name": "Computers",
                        "url": "/en/computers",
                        ... (etc) ...
                    },
                  
                ]
            },
            "links": {
                "self": "https://glue.de.b2c.demo-spryker.com/category-trees"
            }
        }
    ],
    "links": {
        "self": "https://glue.de.b2c.demo-spryker.com/category-trees"
    }
}

 ```

## Development with Docker (Optional)

Just by having docker installed and running `make` on the root of the project, you'll have 
everything you need for development. Every developer will have the same PHP and Composer versions.

This command does the following:
- Builds the required docker images with the required binaries for development (php, composer 
  and other stuff)
- Installs dependencies with composer
- Setups the git hooks
- Boots the development stack

By default, the PHP container executes a dummy long-running process, so the container is always up 
and running. You can configure a remote interpreter in PHPStorm that points to that running
container to run test suites and get code analysis.

When you are done working, `make stop` is your best friend.

You can still use your own PHP version, but then you risk your changes to be rejected due to
incompatibility or having issues installing / upgrading dependencies.

### Running Commands

There are predefines commands on the Makefile to run the most common tasks.

You can run `make pr` to get feedback on the overall quality of your code. You can also run 
`make statica` to run the static analysis, `make fmt` to format the code according to the PHP CS 
Fixer standards defined in the project, or `make test` to run the test suite. All these run on
the docker stack, so make sure your services are up and running with `make boot`.

If you want to install a package or run a specific command, is best to do so through the docker 
stack. So a composer install would look like this:

```bash
docker-compose exec lib composer install
```

This is quite long to type, so there are two alternatives:

First, you can create an alias for `docker-compose`, like `dc`

```bash
dc exec lib composer install
```

Another option is to run `make shell` and open a shell directly into the container. Then you can
run the commands as if you were in your machine:

```ash
composer install
```

### Git Hooks

The git hooks validate that your code is good to merge. By default, a pre-commit hook is installed
that runs `make pr` every time you commit.

You can always use the `--no-verify` flag to bypass the git hook:

> git commit -m 'your message' --no-verify

But I like to use them by default to catch potential easy-to-check mistakes.
