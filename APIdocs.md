**Create Author**
----
  Creates a new Author.

* **URL**

  /authors

* **Method:**

  `POST`

* **Data Params**
   **Required:**
  name

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `Successfully created author`
 
* **Error Response:**

  * **Code:** 400 BAD REQUEST<br />
    **Content:** `Invalid parameters`

* **Sample request body:**

  ```javascript
    {
      "name":"George RR Martin"
    }
  ```
**Create Article**
----
  Creates a new Article.

* **URL**

  /articles

* **Method:**

  `POST`

* **Data Params**
   **Required:**
  authors

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `Successfully created article`
 
* **Error Response:**

  * **Code:** 400 BAD REQUEST<br />
    **Content:** `Invalid parameters`

* **Sample request body:**

  ```javascript
    {
      "title":"test title",
      "url":"http://www.sathira.com",
      "content": "test content",
      "authors": [1,2,3]
    }
  ```
  
**View Article**
----
  Returns json data about a single article.

* **URL**

  /articles/:id

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   `id=[integer]`

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ "id": 2, "title": "Anewarticle", "author": "JaneSmith", "content": "All the Content" "url": "/article/1", "createdAt": "2017-03-20" }`
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** `{ error : "Article doesn't exist" }`
    
* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/articles/1",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```
**List Articles**
----
  Returns json data about all articles.

* **URL**

  /articles

* **Method:**

  `GET`

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `[{"id": 1,"title": "Anewarticle","author": "JohnSmith","summary": "Some content...","url": "/article/1","createdAt": "2017-03-20"},{"id": 2,"title": "Anewarticle","author": "JaneSmith","summary": "Some content...","url": "/article/2","createdAt": "2017-03-20"}]`
 
* **Error Response:**
None
    
* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/articles",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```
  
**Update Article**
----
  Updates an existing Article.

* **URL**

  /articles/:id

* **Method:**

  `PUT`
  
*  **URL Params**

   **Required:**
 
   `id=[integer]`

* **Data Params**
   **Required:**
  authors

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `Successfully updated article`
 
* **Error Response:**

  * **Code:** 400 BAD REQUEST<br />
    **Content:** `Invalid parameters`

* **Sample request body:**

  ```javascript
    {
      "title":"test title",
      "url":"http://www.sathira.com",
      "content": "test content",
      "authors": [1,2,3]
    }
  ```
  
**Delete Article**
----
  Deletes a single article.

* **URL**

  /articles/:id

* **Method:**

  `DELETE`
  
*  **URL Params**

   **Required:**
 
   `id=[integer]`

* **Data Params**

  None

* **Success Response:**

  * **Code:** 204 <br />
    **Content:** None
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** `{ error : "Article doesn't exist" }`
    
* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/articles/1",
      dataType: "json",
      type : "DELETE",
      success : function(r) {
        console.log(r);
      }
    });
  ```
