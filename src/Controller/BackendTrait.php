<?php

namespace Drupal\search_api_solr\Controller;

use Drupal\search_api\ServerInterface;
use Drupal\search_api_solr\SolrBackendInterface;

/**
 * Provides a listing of Solr Entities.
 */
trait BackendTrait {

  /**
   * The Search API server backend.
   *
   * @var \Drupal\search_api_solr\SolrBackendInterface
   */
  protected $backend;

  /**
   * The Search API server ID.
   *
   * @var string
   */
  protected $serverId = '';

  /**
   * The Solr minimum version string.
   *
   * @var string
   */
  protected $assumed_minimum_version = '';

  /**
   * Sets the Search API server and calls setBackend() afterwards.
   *
   * @param \Drupal\search_api\ServerInterface $server
   *   The Search API server entity.
   *
   * @throws \Drupal\search_api\SearchApiException
   */
  public function setServer(ServerInterface $server) {
    /** @var SolrBackendInterface $backend */
    $backend = $server->getBackend();
    $this->setBackend($backend);
    $this->serverId = $server->id();
  }

  /**
   * Sets the Search API server backend.
   *
   * @param \Drupal\search_api_solr\SolrBackendInterface $backend
   *   The Search API server backend.
   */
  public function setBackend(SolrBackendInterface $backend) {
    $this->backend = $backend;
    $this->reset = TRUE;
  }

  /**
   * Returns the Search API server backend.
   *
   * @return \Drupal\search_api_solr\SolrBackendInterface
   *   The Search API server backend.
   */
  protected function getBackend() {
    return $this->backend;
  }

  public function setAssumedMinimumVersion(string $assumed_minimum_version) {
    $this->assumed_minimum_version = $assumed_minimum_version;
  }
}
