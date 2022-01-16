<?php

namespace Drupal\mycustominter\Plugin\Minter;

use Drupal\Component\Serialization\Json;
use Drupal\nft_mint\Plugin\Minter\MinterBase;
use GuzzleHttp\RequestOptions;

/**
 * Defines a "custom" minter plugin.
 *
 * @Minter(
 *   id = "minter_custom",
 *   title = @Translation("Custom"),
 *   description = @Translation("A custom minter")
 * )
 */
class CustomMinter extends MinterBase {

  /**
   * {@inheritDoc}
   */
  public function mint(array $metadata) {
    $result = [];

    try {
      // Call your service(s) to mint the NFT.
      $response = $this->httpClient->get('https://remote.service/api/create-nft', [
        RequestOptions::BODY => Json::encode($metadata),
      ]);

      $result = Json::decode($response->getBody());

      $this->logger->notice($this->t('NFT was minted @token_id', [
        'token_id' => $result['token_id'] ?? NULL,
      ]));

    } catch (\Exception $e) {
      $this->logger->error($e->getMessage());
    }

    return $result;
  }

}
