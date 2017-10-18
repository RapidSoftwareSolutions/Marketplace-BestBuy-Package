[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/BestBuy/functions?utm_source=RapidAPIGitHub_BestBuyFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# BestBuy Package
Best Buy is a leading provider of technology products, services and solutions. The company offers expert service at an unbeatable price more than 1.5 billion times a year to the consumers, small business owners and educators who visit our stores, engage with Geek Squad Agents or use BestBuy.com or the Best Buy app. The company has operations in the U.S. where more than 70 percent of the population lives within 15 minutes of a Best Buy store, as well as in Canada and Mexico, where Best Buy has a physical and online presence.
* Domain: [www.bestbuy.com](https://www.bestbuy.com/)
* Credentials: apiKey

## How to get credentials: 
0. Visit [BestBuy](https:\/\/developer.bestbuy.com\/login) and sign up with your email.
1. After,you get an email with instructions on how to activate your new api key.
 
## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ``` 
 
## BestBuy.getProductBySearchQuery
The Products API gives you access to the full Best Buy catalog.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| API key that you received from BestBuy.
| returnedFields| String     | The show attribute allows you to control which attributes are returned.To return all attributes `all`.
| searchQuery   | String     | Search consists of one or more terms that generally include an attribute, operator and value. Terms are combined with ampersands & or pipes. Searches are implemented as part of an HTTP GET request to the deisred Best Buy API. term1&term2 - specifies term1 AND term2 `term1{pipes}term2` - specifies term1 OR term2.Example - `customerReviewCount=5&dollarSavings=10.99&(categoryPath.id=pcmcat310200050004)`.
| pageSize      | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. Use the page parameter to choose which page of results you’d like returned.
| pageSize      | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. 
| page          | Number     | Use the `page` parameter to choose which page of results you’d like returned.
| facetsQuery   | Number     | You can retrieve summary information about the items that are returned by your query by using the facets query parameter.
| facetsNumber  | Number     | Facets number.Required if use facetsQuery.
| sort          | String     | You can specify the way in which you’d like to have the results sorted by one or more attribute value(s).`attribute.asc` - Sort the results in ascending order of the specified attribute. `attribute.dsc` - Sort the results in descending order of the specified attribute. `attribute.desc` - Sort the results in descending order of the specified attribute.
| cursorMask    | String     | With large result sets - e.g., query sets with more than 10 pages of results - we recommend you use the cursorMark parameter to walk through your results. You can use cursorMark to walk through the full product or store catalog, deltas since you last queried for active products, or any other query result. The cursorMark works a lot like a bookmark, keeping track of what subset of items are currently shown in your result set and how to get to the next subset of items.To use the cursorMark with your result set, add cursorMark=* to your query parameters.

### Search Techniques

Search consists of one or more terms that generally include an attribute, operator and value. Terms are combined with ampersands & or pipes `|`. Searches are implemented as part of an HTTP GET request to the deisred Best Buy API. `term1&term` - specifies term1 AND term2 `term1|term2` - specifies term1 OR term2.

Attribute names are case sensitive; attribute values are not. For example you can use [api explore](http://bestbuyapis.github.io/bby-query-builder/#/productSearch).

Available Operators
1. `=` - attribute equals a specified value
2. `=!` - attribute does not equal a specified value
3. `>` - attribute greater than a specified value
4. `<` - attribute less than a specified value
5. `>=<` - attribute greater than or equal to a specified value
6. `<=` - attribute less than or equal to a specified value
7. `in` - search based on a list of attribute values

#### Search by a single attribute

Our Products, Stores and Categories APIs can be searched by nearly all available attributes. For example, to find only the stores located in Utah, you can use the query shown to the right.
For example: `region=ut`

#### Search by all attributes (AND)
If you need to search for the values of more than one attribute and all of the attributes must be present, combine them with an ampersand `&`.
For example: `manufacturer=canon&salePrice<1000`

#### Search by any attributes (OR)
If you want items with any of the specified attributes, combine them with a pipe `|`.
For example: `wifiReady=true|wifiBuiltIn=true`

#### Complex Searches
Complex searches can be performed by combining AND `&` and OR `|` operations with parantheses. For example: let’s say that you’re looking for a Play Station Portable video game (platform=psp). You don’t want to spend more than $15 (salePrice<=15). However, because you will trade in the game when you’re done, you could spend up to $20 (salePrice<=20). You also want to make sure the game is available to buy online and pickup at a store (inStorePickup=true).

The search terms for this example can be combined as:

`platform=psp & (salePrice<=15 | (salePrice<=20 & inStorePickup=true))`

For example: `platform=psp&(salePrice<=15|(salePrice<=20&inStorePickup=true))`

#### Search by date range
If you want to find all products that were released February 2014, use this query:
`releaseDate>=2014-02-01&releaseDate<=2014-02-28`

#### Search by date relative to today
You can also use the value `today` to represent the current day. If you want to see all the products that were released today, use this query.
For example: `releaseDate>today`

#### Search for multiple attribute values
If you want multiple values of a single attribute, you can specify them individually. For example, if you want to see white, bisque, or stainless-steel side-by-side refrigerators, use this query.

NOTE: To search for products based on a list of attribute values, we recommend using the `in` operator. Most attributes can be used with the `in` operator. The most common attribute used is SKU. Using the in operator helps to avoid Query Per Second errors (QPS).

For example: `sku in(43900,2088495,7150065)`

#### Wildcards - Value is present
You can use the asterisk `*` as a wildcard character. The wildcard can be used to:

1. indicate the presence of attribute values
2. request all values for filtered attributes
3. tokenize the string and represent additional characters

Some attributes apply only to specific items. Even then, because much of this attribute information comes from the manufacturer, not all items of a given type will have values set for that attribute. You can use the wildcard to specify items that have data for a specific attribute.

- `attribute=*` - requests items for which the attribute has values.
- `attribute!=*` -  requests items for which the attribute has no value.

For example: - `categoryPath.id=abcat0502000&driveCapacityGb=*`

#### Wildcards - Value is NOT present
This will return results in which there is no value present. In the following example, with the addition of the !, the return result has shifted from Solid State Drive.

For example: - `categoryPath.id=abcat0502000&driveCapacityGb!=*`

#### Wildcards - String
When used as part of a string search, the wildcard performs two functions. First, it tokenizes the string, breaking it into words. Second, it operates as a standard wildcard, matching any set of characters in the tokenized string. The following example illustrates both functions. When searching for a string value, you may want to search for variations on a specific word.

There are several description attributes by which you can search, including `longDescription`, `shortDescription`, `description` or `name`. There is a single SKU attribute to search based on SKU.

In this example we are searching the longDescription for iPhone*. We have appended iPhone with a wildcard * so we can search for iPhones with any suffix. We are also looking for any products that have a SKU with a value of 7619002 - note the or `|`. Finally, in our example we have updated the number of results that can be returned per page to 15. Our search will return page 5 of the total 184 pages. Additional information on how to specify the number of results that should be returned per page and which page to return can be found in our Pagination section.

For example: - `longDescription=iPhone*|sku=7619002`

#### Wildcard - Limitations

- You cannot use a wildcard to begin a string search (e.g. (name=*top)); this type of search is extremely resource intensive and doing so will result in a 400 error.
- Wildcard with data is valid for strings only. When used alone, the wildcard can represent any data type. When used with other characters, the wildcard can only represent string data. For example, to find Canon products with customer reviews of 4.x, you cannot use (manufacturer=canon&customerReviewAverage=4.*) as the search string. You would have to use a search string like this: (manufacturer=canon&customerReviewAverage>4&customerReviewAverage<5).

#### Filtered product attribute 
ertain attributes, such as active=true, digital=false or preowned=false inherently filter results.

If your search string is `sku=*`, you will only return active products, not all products. This is the same as specifying `sku=*&active=true`. If you want a list of all active and inactive products, you can specify sku=*&active=*.

Because active is a boolean attribute, `active=*` will return products for which active is either true or false. It’s the same as sku=*&(active=true|active=false).

If your search string goes to sku.xml or sku.json these filters are ignored.

#### Keyword Search Function

Our Keyword Search function (search=searchterm) allows you to search text accross several common attributes. To search for a term that includes a space, include an & ampersand between the words or it will be treated as an `|` or. The Keyword Search includes the following attributes:

1. name
2. manufacturer
3. shortDescription
4. longDescription
5. features.feature
6. details.value

#### Search on Reviews

To search for products based on customer review criteria, you can use the customerReviewAverage and/or the customerReviewCount attributes. You can also limit the product information returned using our show functionality. HINT: You can specify additional attributes in your search or to be included in the response document for most attributes in the Products API.

In this example, we are searching for all products that have a customer review average greater than four and a customer review count greater than 100. In addition, we are limiting the product information returned to customer review average, customer review count, name and sku, and forcing a format of json (default is xml when using the Products API).

## BestBuy.openBoxBySKU
The Open Box Single SKU endpoint allows you to query by SKU all Open Box offers associated with a SKU. If there are no Open Box offers available, the query will return a HTTP 200 response code with an empty result set.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| API key that you received from BestBuy.
| SKU     | Number     | Search all open box offers for SKU. We can see there are at least two offers excellent and certified.
| pageSize| Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. 
| page    | Number     | Use the `page` parameter to choose which page of results you’d like returned.

## BestBuy.openBoxByListSKUs
The Open Box by List of SKUs endpoint allows you to query all Open Box offers associated with a list of SKUs. The endpoint will return any available Open Box offers. If there is not an offer for a particular SKU in the list, that SKU will not be represented in the results.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| API key that you received from BestBuy.
| SKUs    | List       | The Open Box by List of SKUs endpoint allows you to query all Open Box offers associated with a list of SKUs. The endpoint will return any available Open Box offers. If there is not an offer for a particular SKU in the list, that SKU will not be represented in the results.
| pageSize| Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. 
| page    | Number     | Use the `page` parameter to choose which page of results you’d like returned.

## BestBuy.getAllOpenBox
The endpoint will return any available Open Box offers.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| API key that you received from BestBuy.
| pageSize| Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. 
| page    | Number     | Use the `page` parameter to choose which page of results you’d like returned.

## BestBuy.openBoxByCategory
The Open Box by Category endpoint allows you to query all Open Box offers associated with the SKUs in the requested category. If there are no Open Box offers available, the query will return a HTTP 200 response code with an empty result set.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| API key that you received from BestBuy.
| categoryId| String     | Category Id.Example - abcat0400000.
| pageSize  | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. 
| page      | Number     | Use the `page` parameter to choose which page of results you’d like returned.

## BestBuy.getAllCategories
The query to the right will return all the Best Buy product categories. Query is filtered to show only ids.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| API key that you received from BestBuy.
| returnedFields| String     | The show attribute allows you to control which attributes are returned.To return all attributes `all`.
| pageSize      | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. Use the page parameter to choose which page of results you’d like returned.
| pageSize      | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. 
| page          | Number     | Use the `page` parameter to choose which page of results you’d like returned.
| facetsQuery   | Number     | You can retrieve summary information about the items that are returned by your query by using the facets query parameter.
| facetsNumber  | Number     | Facets number.Required if use facetsQuery.
| sort          | String     | You can specify the way in which you’d like to have the results sorted by one or more attribute value(s).`attribute.asc` - Sort the results in ascending order of the specified attribute. `attribute.dsc` - Sort the results in descending order of the specified attribute. `attribute.desc` - Sort the results in descending order of the specified attribute.
| cursorMask    | String     | With large result sets - e.g., query sets with more than 10 pages of results - we recommend you use the cursorMark parameter to walk through your results. You can use cursorMark to walk through the full product or store catalog, deltas since you last queried for active products, or any other query result. The cursorMark works a lot like a bookmark, keeping track of what subset of items are currently shown in your result set and how to get to the next subset of items.To use the cursorMark with your result set, add cursorMark=* to your query parameters.

## BestBuy.getCategoriesByName
The following query will return the category path for the category name specified in the input.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| API key that you received from BestBuy.
| categoryName  | String     | Category name.
| returnedFields| String     | The show attribute allows you to control which attributes are returned.To return all attributes `all`.
| pageSize      | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. Use the page parameter to choose which page of results you’d like returned.
| pageSize      | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. 
| page          | Number     | Use the `page` parameter to choose which page of results you’d like returned.
| facetsQuery   | Number     | You can retrieve summary information about the items that are returned by your query by using the facets query parameter.
| facetsNumber  | Number     | Facets number.Required if use facetsQuery.
| sort          | String     | You can specify the way in which you’d like to have the results sorted by one or more attribute value(s).`attribute.asc` - Sort the results in ascending order of the specified attribute. `attribute.dsc` - Sort the results in descending order of the specified attribute. `attribute.desc` - Sort the results in descending order of the specified attribute.
| cursorMask    | String     | With large result sets - e.g., query sets with more than 10 pages of results - we recommend you use the cursorMark parameter to walk through your results. You can use cursorMark to walk through the full product or store catalog, deltas since you last queried for active products, or any other query result. The cursorMark works a lot like a bookmark, keeping track of what subset of items are currently shown in your result set and how to get to the next subset of items.To use the cursorMark with your result set, add cursorMark=* to your query parameters.

## BestBuy.getCategoriesById
The following query will return the category path for the category id specified in the input.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| API key that you received from BestBuy.
| categoryId    | String     | Category id.
| returnedFields| String     | The show attribute allows you to control which attributes are returned.To return all attributes `all`.
| pageSize      | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. Use the page parameter to choose which page of results you’d like returned.
| pageSize      | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. 
| page          | Number     | Use the `page` parameter to choose which page of results you’d like returned.
| facetsQuery   | Number     | You can retrieve summary information about the items that are returned by your query by using the facets query parameter.
| facetsNumber  | Number     | Facets number.Required if use facetsQuery.
| sort          | String     | You can specify the way in which you’d like to have the results sorted by one or more attribute value(s).`attribute.asc` - Sort the results in ascending order of the specified attribute. `attribute.dsc` - Sort the results in descending order of the specified attribute. `attribute.desc` - Sort the results in descending order of the specified attribute.
| cursorMask    | String     | With large result sets - e.g., query sets with more than 10 pages of results - we recommend you use the cursorMark parameter to walk through your results. You can use cursorMark to walk through the full product or store catalog, deltas since you last queried for active products, or any other query result. The cursorMark works a lot like a bookmark, keeping track of what subset of items are currently shown in your result set and how to get to the next subset of items.To use the cursorMark with your result set, add cursorMark=* to your query parameters.

## BestBuy.getTrendingProductsByCategoryId
The Trending Products endpoint returns top ten products, by rank, based on customer views of the BESTBUY.COM product detail page over a rolling three hour time period. Trending growth is based on a comparison against the previous three hour time period.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| API key that you received from BestBuy.
| categoryId| String     | Category Id.Example - abcat0400000.
| pageSize  | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. 
| page      | Number     | Use the `page` parameter to choose which page of results you’d like returned.

## BestBuy.getPopularViewedProductsByCategoryId
The Most Popular Viewed endpoint returns the top ten products, by rank, of the most frequently viewed products on BESTBUY.COM. You can also pull this same information by category or subcategory. To find out additional information about identifying category ids please refer to our Categories API documentation. This data for Most Popular Viewed is refreshed every two hours with a maximum accumulation time of 48 hours when determining the top ten products.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| API key that you received from BestBuy.
| categoryId| String     | Category Id.Example - abcat0400000.
| pageSize  | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. 
| page      | Number     | Use the `page` parameter to choose which page of results you’d like returned.

## BestBuy.getAlsoViewedProduct
The Also Viewed Products endpoint can be used to identify top ten products that were viewed along with the originating product. These results are determined based on aggregated customer browsing behavior over the past thirty days on BESTBUY.COM.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key that you received from BestBuy.
| productId| String     | Product Id.Example - 5747275.
| pageSize | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. 
| page     | Number     | Use the `page` parameter to choose which page of results you’d like returned.

## BestBuy.getStoresBySearchQuery
The Best Buy Stores API provides store information for all Best Buy stores in the United States and Puerto Rico. This information includes address, location, hours and services offered.In addition, store availability of a product can be determined by querying the Products API together with the Stores API. Refer to In Store Availability for more information on these type of queries.See how build search query in getProductBySearchQuery endpoint description .

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| API key that you received from BestBuy.
| searchQuery   | String     | Search consists of one or more terms that generally include an attribute, operator and value. Terms are combined with ampersands & or pipes. Searches are implemented as part of an HTTP GET request to the deisred Best Buy API. term1&term2 - specifies term1 AND term2 `term1{pipes}term2` - specifies term1 OR term2.Example - `(city=New-York)&((storeType=warehouse sale))&((services.service="car & gps installation services"))`.See how build search query in getProductBySearchQuery endpoint description .
| returnedFields| String     | The show attribute allows you to control which attributes are returned.To return all attributes `all`.
| pageSize      | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. Use the page parameter to choose which page of results you’d like returned.
| pageSize      | Number     | By default, we include 10 results per page, but you can ask for up to 100 per page by making use of the `pageSize` parameter. 
| page          | Number     | Use the `page` parameter to choose which page of results you’d like returned.
| facetsQuery   | Number     | You can retrieve summary information about the items that are returned by your query by using the facets query parameter.
| facetsNumber  | Number     | Facets number.Required if use facetsQuery.
| sort          | String     | You can specify the way in which you’d like to have the results sorted by one or more attribute value(s).`attribute.asc` - Sort the results in ascending order of the specified attribute. `attribute.dsc` - Sort the results in descending order of the specified attribute. `attribute.desc` - Sort the results in descending order of the specified attribute.
| cursorMask    | String     | With large result sets - e.g., query sets with more than 10 pages of results - we recommend you use the cursorMark parameter to walk through your results. You can use cursorMark to walk through the full product or store catalog, deltas since you last queried for active products, or any other query result. The cursorMark works a lot like a bookmark, keeping track of what subset of items are currently shown in your result set and how to get to the next subset of items.To use the cursorMark with your result set, add cursorMark=* to your query parameters.
