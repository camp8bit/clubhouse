# Clubhouse

Clubhouse is an alternative to Facebook private groups.

## Staring a dev environment

You'll need PHP, MySQL and [Composer](https://getcomposer.org/) installed.

 * Check out code
 * Run `composer install`
 * Copy `.env.sample` to `.env` and load in your database credentials
 * Run `vendor/bin/serve`
 * Open http://localhost:3000/dev/build/
 * Open http://localhost:3000/admin/
 * Log in with the credentials included at the bottom of `.env`

## Play with the API

Open http://localhost:3000/dev/graphiql and run a query. Here's a sample to get your started. Note that the syntax of this query will undoubtedly change.

```
{
  readClubhouseClubhouses {
    edges {
      node {
        ID
        Title
        Subdomain
        Members {
          edges {
            node {
              FirstName
              Surname
            }
          }
        }
        Posts {
          edges {
            node {
              Created
              Author {
                FirstName
                Surname
              }
              Subject
              Message
              Importance
            }
          }
        }
      }
    }
  }
}
```
