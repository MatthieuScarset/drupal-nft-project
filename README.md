# Drupal NFT project

This is a template to quickly test [the NFT module](https://drupal.org/project/nft).

Requirements:

- [Composer](https://getcomposer.org/download/)
- [Lando](https://lando.dev/download/)

## Usage

First, install the pre-configured Drupal site.

```bash
git clone THIS-REPO
lando composer install -o --ignore-platform-req=ext-gmp
lando drush site-install -y
lando drush cache-rebuild -y
lando drush config-import -y
lando drush upwd admin admin
lando drush uli
```

Finally, create a page and import some NFTs in
[Admin > Content > Add content](https://drupalnft.lndo.site/node/add/page).

Have fun buiDling!

## Mint

Set your NFTPort.xyz API key
[in backoffice (Admin > Config > Media > NFTPort)](https://drupalnft.lndo.site/admin/config/nft/nftport):

```bash
API Key: 'ENTER-YOUR-KEY'
```

Go to Admin > Content.

Click on the dropdown select in the last column and select the "Mint" operation.

## Known issues

You might have issue retrieving assets from OpensSea.io.

If so, try to set the API key in `.env` file at project's root:

```bash
opensea_api_key='ENTER-YOUR-KEY'
```

---

Still have questions? Feel free [to contact me](https://matthieuscarset.com) anytime.
