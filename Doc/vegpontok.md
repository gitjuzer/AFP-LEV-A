##### Kész végpontok

###### MINDEN KÉRÉSBE: 
    
    Header name: Accept
    
    Header value: application/json
    
##### Figyelem: a hibakezelés még nem teljes. Igyekezzetek csak olyan azonosítókat és relációkat használni, amelyekről tudjátok, hogy léteznek az adatbázisban!

1. Bejelentkezés

        URL: https://nyusz.eu/afpleva/public/api/login
        
        Method: POST
        
        Body Content Type: application/json
        
        Body Content: {"email": "arjunphp@gmail.com", "password": "Arjun@123"}
    
    Ha ezt kapod:
    
        {
        "error": true,
        "message": "These email credentials do not match our records."
        }
    
    Akkor a body content type a hibás, vagy elírtad az adatokat.
    
    Ha ezt:
    
        {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJlbWFpbCI6ImFyanVucGhwQGdtYWlsLmNvbSJ9.yXgY7LWB3_lHEkPB9pj5onGsNWk8norftkRdGesXMb8"
        }
    
    Akkor siker. A token tartalmát (a kettőspont utáni karakterlánc ékezetek nélkül) mentsd el, 
    ez kell majd a következő lekérdezéshez a Bearer után.
    
    
    
2. Bejelentkezett user adatainak lekérdezése

        URL: https://nyusz.eu/afpleva/public/sapi/user
        
        Method: GET
        
        Header 1 name: Content-Type
        
        Header 1 value: application/json
        
        Header 2 name: Authorization
        
        Header 2 value: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJlbWFpbCI6ImFyanVucGhwQGdtYWlsLmNvbSJ9.yXgY7LWB3_lHEkPB9pj5onGsNWk8norftkRdGesXMb8
        
    A hosszú karakterlánc egyedi, az előző pontban ezt kaptad vissza. Módosítsd a kérést e-szerint!
    
3. Regisztráció

        URL: https://nyusz.eu/afpleva/public/api/register
        
        Method: POST
        
        Body Content Type: application/json
    
    Body Content példa: 
    
        {
            "loginName": "loginName",
            "realName": "realName",
            "email": "valami@example.com",
            "password": "123456"
        }
    
    A sikeres regisztráció válasza ugyanaz mint a login esetében.
    
4. Topic

- Új

        URL: https://nyusz.eu/afpleva/public/sapi/topic
        
        Method: POST
        
        Body Content Type: application/json
    
    Body Content példa: 
    
        {"name": "topic name", "description": "topic desription"}
		
	Válasz:
	
		{
			"status": "success",
			"code": 200,
			"payload": {
				"name": "topic name",
				"description": "topic description",
				"id": 2
			}
		}
		
		A nem létező ID-re kapott válasz egyelőre nincs jól lekezelve. 200-as státuszú választ kapsz, de a payload mezői null értékűek.
		A későbbiekben erre 404-es státusz fog érkezni válaszul.
		
	#### Minden új rekord tárolására ez a válasz érkezik, természetesen a saját adatszerkezetével. Ezért ezeket a későbbiekben már nem részletezem. Ha sikeresen tárolsz egy rekordot, akkor mindig visszakapod 	a rekord minden mezőjét, beleértve az azonosítóját is, tehát ezzel azonnal tudsz dolgozni.
        
 - Módosít
 
        URL: https://nyusz.eu/afpleva/public/sapi/topic/{id}
        
        Method: PUT
        
        Body Content Type: application/json
    
    Body Content példa: 
    
        {"name": "topic name", "description": "topic desription"}
        
 - Lista
 
        URL: https://nyusz.eu/afpleva/public/sapi/topics
        
        Method: GET
        
 - Adott id 
 
        URL: https://nyusz.eu/afpleva/public/sapi/topic/{id}
        
        Method: GET
        
 - Törlés
 
        URL: https://nyusz.eu/afpleva/public/sapi/topic/{id}
        
        Method: DELETE
        
5. Curriculum

- Új

        URL: https://nyusz.eu/afpleva/public/sapi/curriculum
        
        Method: POST
        
        Body Content Type: application/json
    
    Body Content példa: 
    
        {"title": "curriculum title", "content": "curriculum content", "topic": 2}
        
 - Lista
 
        URL: https://nyusz.eu/afpleva/public/sapi/curricula
        
        Method: GET
        
 - Lista topic ID-re szűrve
 
        URL: https://nyusz.eu/afpleva/public/sapi/curricula?topic={id}
        
        Method: GET   
        
 - Adott id 
 
        URL: https://nyusz.eu/afpleva/public/sapi/curriculum/{id}
        
        Method: GET
        
  - Törlés
 
        URL: https://nyusz.eu/afpleva/public/sapi/curriculum/{id}
        
        Method: DELETE
        
  - Az update methodok idő híján egyelőre kimaradnak a további elemekből is. Addig is, ha módosítani szeretnétek: delete + post.
  
6. ExerciseDilemma

- Új

        URL: https://nyusz.eu/afpleva/public/sapi/exerciseDilemma
        
        Method: POST
        
        Body Content Type: application/json
    
    Body Content példa: 
    
        {"question": "Ez egy kérdés?", "yesNo": 1, "topic": 2}
        
 - Lista
 
        URL: https://nyusz.eu/afpleva/public/sapi/exerciseDilemmas
        
        Method: GET
        
 - Lista topic ID-re szűrve
 
        URL: https://nyusz.eu/afpleva/public/sapi/exerciseDilemmas?topic={id}
        
        Method: GET
        
 - Adott id 
 
        https://nyusz.eu/afpleva/public/sapi/exerciseDilemma/{id}
        
        Method: GET
        
  - Törlés
 
        URL: https://nyusz.eu/afpleva/public/sapi/exerciseDilemma/{id}
        
        Method: DELETE
		
7. ExerciseList

- Új

    URL: https://nyusz.eu/afpleva/public/sapi/ExerciseList
        
    Method: POST
        
    Body Content Type: application/json
    
    Body Content példa: title": "A feladatsor címe"}
		
	A tanár ID hozzáadása automatikus. Mivel jelenleg nincs jogosultságrendszer, így akár diák is tárolhat.
	Az azonosítót a Tokenből dekódolja a rendszer.
        
- Lista
 
    URL: https://nyusz.eu/afpleva/public/sapi/ExerciseList
        
    Method: GET
        
- Lista tanár ID-re szűrve
 
    URL: https://nyusz.eu/afpleva/public/sapi/ExerciseLists?teacher={id}
        
    Method: GET
        
- Adott id 
 
    https://nyusz.eu/afpleva/public/sapi/ExerciseList/{id}
        
    Method: GET
        
- Törlés
 
    URL: https://nyusz.eu/afpleva/public/sapi/ExerciseList/{id}
        
    Method: DELETE
		
- Feladatok hozzárendelése

	URL: https://nyusz.eu/afpleva/public/sapi/ExerciseList/{id}/assign
        
    Method: POST
        
    Body Content Type: application/json
    
    Body Content példa jelenleg: 
    
        {"dilemma": [1,2,3,4,5]}
	
	Body Content példa később, ha már tárolható lesz a másik feladattípus is:
	
		{"dilemma": [1,2,3,4,5], "multipleChoice": [1,2,3,4,5]}
		
	Vagyis a hozzárendelendő feladatokat típusonként csoportosítva, az azonosítójukkal ellátva kell felsorolni.

	##### Figyelem: az assign parancs jelenleg felülírja a listát, tehát mindig a teljes felsorolást csatold!

- Hozzárendelt feladatok megjelenítése (feladatsor lekérése a vizsgákhoz, nem lesz benne a helyes válasz)

	URL: https://nyusz.eu/afpleva/public/sapi/ExerciseList/{id}/assigned
        
    Method: GET
        
    Body Content Type: application/json
