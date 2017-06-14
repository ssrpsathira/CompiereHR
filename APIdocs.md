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
**Show User**
----
  Returns json data about a single user.

* **URL**

  /users/:id

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   `id=[integer]`

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ id : 12, name : "Michael Bloom" }`
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** `{ error : "User doesn't exist" }`

  OR

  * **Code:** 401 UNAUTHORIZED <br />
    **Content:** `{ error : "You are unauthorized to make this request." }`

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/users/1",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```
