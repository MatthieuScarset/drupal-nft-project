# Drupal NFT project

This is a template to quickly test [the NFT module](https://drupal.org/project/nft).

Requirements:

- [Composer](https://getcomposer.org/download/)
- [Lando](https://lando.dev/download/)

## Usage

```
git clone THIS-REPO
lando composer install -o --ignore-platform-req=ext-gmp
lando drush si --existing-config -y
lando drush upwd admin admin
lando drush uli
```

Have fun buiDling!

---

Still have questions? Feel free [to contact me](https://matthieuscarset.com) anytime.
