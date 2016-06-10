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

