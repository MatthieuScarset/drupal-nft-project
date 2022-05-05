# Drupal NFT project

This is a template to quickly test the NFT module: [https://www.drupal.org/project/nft](https://drupal.org/project/nft)

Requirements:

- Install [Composer](https://getcomposer.org/download/)
- Install [Lando](https://lando.dev/download/)

## Usage

First, start the beast:

```bash
git clone https://github.com/MatthieuScarset/drupal-nft-project.git
cd drupal-nft-project
cp .env.example .env
cp web/sites/example.settings.local.php web/sites/default/settings.local.php
lando start
lando composer install -o --ignore-platform-req=ext-gmp
```

Then install the pre-configured Drupal site.

```bash
lando drush site-install --existing-config -y
lando drush cache-rebuild -y
lando drush config-import -y
lando drush upwd admin admin
lando drush user-login
```

Create a page and import some NFTs:

- Go to [Admin > Content > Add content](https://drupalnftproject.lndo.site/node/add/page).
- Add media in the field below title
- Save
- Enjoy the view...

Have fun buiDling!

## Mint

Set your NFTPort.xyz API key
[in backoffice (Admin > Config > Media > NFTPort)](https://drupalnftproject.lndo.site/admin/config/nft/nftport):

```bash
API Key: 'ENTER-YOUR-KEY'
```

Go to Admin > Content.

Click on the dropdown select in the last column and select the "Mint" operation.

## Known issues

### NFT media type was not imported after site install.

Run this command to (re)create the NFT media type, if missing:

```bash
lando drush eval "_nft_media_create_media_type();"
```

### Error during import from OpenSea.io

You might have issue retrieving assets from OpensSea.io:

`The provided URL does not represent a valid oEmbed resource.`

If so, try to set the API key in `.env` file at project's root:

```bash
opensea_api_key='ENTER-YOUR-KEY'
```

---

Still have questions? Feel free [to contact me](https://matthieuscarset.com) anytime.
