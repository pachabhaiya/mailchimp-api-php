<?php

namespace Mailchimp;

/**
 * Mailchimp Batch Operations library.
 *
 * @package Mailchimp
 */
class MailchimpBatches extends Mailchimp {

  /**
   * Get a list of batch requests.
   *
   * @param array $parameters
   *   Associative array of optional request parameters.
   *
   * @return object
   *
   * @see https://developer.mailchimp.com/documentation/mailchimp/reference/batches/#read-get_batches
   */
  public function getBatches($parameters = []) {
    return $this->request('GET', '/batches', NULL, $parameters);
  }

  /**
   * Get the status of a batch operation request.
   *
   * @param string $batch_id
   *   The unique id for the batch operation.
   *
   * @param array $parameters
   *   Associative array of optional request parameters.
   *
   * @return object
   *
   * @see https://developer.mailchimp.com/documentation/mailchimp/reference/batches/#read-get_batches_batch_id
   */
  public function getBatch($batch_id, $parameters = []) {
    $tokens = [
      'batch_id' => $batch_id,
    ];

    return $this->request('GET', '/batches/{batch_id}', $tokens, $parameters);
  }

  /**
   * Begin processing a batch operations request.
   *
   * @param array $operations
   *   An array of objects that describes operations to perform.
   *
   * @return object
   *
   * @see https://developer.mailchimp.com/documentation/mailchimp/reference/batches/#create-post_batches
   */
  public function addBatches($operations) {
    $parameters = [
      'operations' => $operations,
    ];

    return $this->request('POST', '/batches', NULL, $parameters);
  }

  /**
   * Delete a batch request and stop if from processing further.
   *
   * @param string $batch_id
   *   The unique id for the batch operation.
   *
   * @return object
   *
   * @see https://developer.mailchimp.com/documentation/mailchimp/reference/batches/#delete-delete_batches_batch_id
   */
  public function deleteBatch($batch_id) {
    $tokens = [
      'batch_id' => $batch_id,
    ];

    return $this->request('DELETE', '/batches/{batch_id}', $tokens);
  }
}
