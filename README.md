#ElasticSearch and Symfony

###ElasticSearch definition:

Elasticsearch is a distributed RESTful search engine built for the cloud. Features include:

* Distributed and Highly Available Search Engine.
  * Each index is fully sharded with a configurable number of shards.
  * Each shard can have one or more replicas.
  * Read / Search operations performed on either one of the replica shard.
* Multi Tenant with Multi Types.
  * Support for more than one index.
  * Support for more than one type per index.
  * Index level configuration (number of shards, index storage, ...).
* Various set of APIs
  * HTTP RESTful API
  * Native Java API.
  * All APIs perform automatic node operation rerouting.
* Document oriented
  * No need for upfront schema definition.
  * Schema can be defined per type for customization of the indexing process.
* Reliable, Asynchronous Write Behind for long term persistency.
* (Near) Real Time Search.
* Built on top of Lucene
  * Each shard is a fully functional Lucene index
  * All the power of Lucene easily exposed through simple configuration / plugins.
* Per operation consistency
  * Single document level operations are atomic, consistent, isolated and durable.
* Open Source under Apache 2 License.


##Install [Elastic Search](http://www.elasticsearch.com) (linux)

**Info**
* [Download Elastic Search](http://www.elasticsearch.com/downloads/)
* [Github project](https://github.com/elasticsearch/elasticsearch/)
* [How to install ElasticSearch](https://github.com/elasticsearch/elasticsearch/blob/master/README.textile) (txt from Github)
* [Guide](http://www.elasticsearch.com/guide/)

###Linux
* Download .deb and install
* Folder: **/usr/share/elasticsearch/**

###Mac
* Previously install java JDK & JRE
* brew install elasticsearch

Run Elastic Search:
<pre>
~ $ sudo elasticsearch (mac)
or
~ $ sudo /etc/init.d/elasticsearch start
</pre>

Test elastic search: **curl 'http://localhost:9200/?pretty'** , shows:
<pre>
{
  "status" : 200,
  "name" : "Thumbelina",
  "version" : {
    "number" : "1.3.2",
    "build_hash" : "dee175dbe2f254f3f26992f5d7591939aaefd12f",
    "build_timestamp" : "2014-08-13T14:29:30Z",
    "build_snapshot" : false,
    "lucene_version" : "4.9"
  },
  "tagline" : "You Know, for Search"
}
</pre>
Shutdown elastic: 
<pre>
~ $ sudo /etc/init.d/elasticsearch stop
or 
~ $ curl -XPOST 'http://localhost:9200/_shutdown'
</pre>


##[Symfony](http://www.symfony.com)
 
<pre>
~ $ composer install 
</pre>

configure Symfony app_dev.php to localhost:
<pre>
~$ php -S localhost:8080 -t web web/app_dev.php
</pre>
or
<pre>
~$ php app/console server:run
</pre>

###Elastica PHP Client

Added to composer.json:
<pre>
        "ruflin/elastica": "2.*",
</pre>

[Elastica vs Elasticsearch-php](http://elastica.io/elastica-vs-elasticsearch-php/)
[GitHub elasticsearch-php](https://github.com/elasticsearch/elasticsearch-php)
[Elastica php client](http://elastica.io)


###FriendsOfSymfony [FOSElasticaBundle](https://github.com/FriendsOfSymfony/FOSElasticaBundle)

This [bundle](https://github.com/FriendsOfSymfony/FOSElasticaBundle/blob/master/Resources/doc/index.md) provides integration with ElasticSearch and Elastica with Symfony2

<pre>php composer.phar require friendsofsymfony/elastica-bundle "~3.0"</pre>
* [Installation](https://github.com/FriendsOfSymfony/FOSElasticaBundle/blob/master/Resources/doc/setup.md)
* [Usage](https://github.com/FriendsOfSymfony/FOSElasticaBundle/blob/master/Resources/doc/usage.md)


#ElasticSearch, Sphinx and Solr comparison links

* [FosElasticaBundle Symfony Barcelona (YouTube es)](http://www.youtube.com/watch?v=eZB9m0FTu8g&app=desktop)
* [SocialCast - Solr vs. ElasticSearch](http://blog.socialcast.com/realtime-search-solr-vs-elasticsearch/)
* [DBEngines - Solr vs. ElasticSearch vs. Sphinx](http://db-engines.com/en/system/Elasticsearch%3BSolr%3BSphinx)
* [JeremyFelt Github - Solr vs. ElasticSearch vs. Sphinx](https://gist.github.com/jeremyfelt/8230088)
* [StackOverflow](http://stackoverflow.com/questions/2271600/elasticsearch-sphinx-lucene-solr-xapian-which-fits-for-which-usage)
