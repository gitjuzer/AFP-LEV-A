# Tesztelési Terv

## Bevezetés
A tesztelők a tesztforgatókönyvnek megfelelően elvégzik a tesztelést és az eredményt a tesztelési jegyzőkönyvben dokumentálják. 
A teszt kimenetelét minden esetben jelenteni kell az adott csapatvezetőjének és dokumentálni Trello-ban. 
A csapatvezetők a team-mel közösen megoldást keresnek a problémákra, majd szükség esetén frissítik a tesztforgatókönyvet. 
Ha a problémát megoldották, a tesztelő újrakezdheti a tesztelést, majd dokumentálja az eredményeket. 
Ha a hiba továbbra is fennáll, és harmadik félen múlik a megoldása eszkalálni kell a problémát a projekt menedzsernek. 

### Minta teszt eset
A teszteket az alábbi minta alapján végezzük:
- **A teszt-eset leírás és célja:**
- **A tesztelt folyamat/funkció leírása:**
- **A tesztelés előfeltételei:**
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:**
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**

# Tesztforgatókönyv

## Backend

### Homepage funkció (api/routes.php)
	
#### Eset 1 - Api működése(api/routes.php)
- **A teszt-eset leírás és célja:** Api megfelelő működése paraméter nékül
- **A tesztelt folyamat/funkció leírása:** A gyökér végpont felé indított http requestek válaszainak elemzése
- **A tesztelés előfeltételei:** Slim api telepítése
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Beérkező kérésre 200-as státuszú válasz.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** Megfelelt

#### Eset 2 - Api működése(api/routes.php)
- **A teszt-eset leírás és célja:** Api megfelelő működése paraméterrel
- **A tesztelt folyamat/funkció leírása:** A paraméterezett végpont felé indított http requestek válaszainak elemzése
- **A tesztelés előfeltételei:** Slim api telepítése
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Beérkező kérésre 200-as státuszú válasz.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** Megfelelt

#### Eset 3 - HTTP werb-ek működése működése(api/routes.php)
- **A teszt-eset leírás és célja:** Post method működése
- **A tesztelt folyamat/funkció leírása:** A gyökér végpont felé indított POST típusú http requestek válaszainak elemzése
- **A tesztelés előfeltételei:** Slim api telepítése
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Beérkező kérésre 200-as státuszú válasz.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** Megfelelt


#### Eset 4 - Tiltott metódusok letiltása(api/routes.php)
- **A teszt-eset leírás és célja:** Tiltott metódusok letiltása
- **A tesztelt folyamat/funkció leírása:** A gyökér végpont felé indított nem regisztrált típusú http requestek válaszainak elemzése
- **A tesztelés előfeltételei:** Slim api telepítése
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Beérkező kérésre 504 státuszú válasz
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** Megfelelt


#### Eset 5 - Nem létező útvonalak(api/routes.php)
- **A teszt-eset leírás és célja:** Nem létező útvonalak
- **A tesztelt folyamat/funkció leírása:** A gyökér végpont felé indított nem regisztrált végpontú http requestek válaszainak elemzése
- **A tesztelés előfeltételei:** Slim api telepítése
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Beérkező kérésre 404 státuszú válasz
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** Megfelelt



### afp/domain/curriculum class 
	
#### Eset 1 - Helyes kiterjesztés
- **A teszt-eset leírás és célja:** A base modell öröklődése
- **A tesztelt folyamat/funkció leírása:** Is base modell
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:** 
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 

#### Eset 2 - Cím beállítás
- **A teszt-eset leírás és célja:** Set title működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadások
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 

#### Eset 3 - Cím visszaadás
- **A teszt-eset leírás és célja:** Get title működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadások ellenőrzése
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 


#### Eset 4 - Context beállítás
- **A teszt-eset leírás és célja:** Set context működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadások
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 


#### Eset 5 - Context visszaadás
- **A teszt-eset leírás és célja:** Get context működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadások ellenőrzése
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 


#### Eset 6 - Tobic beállítás
- **A teszt-eset leírás és célja:** Set topic működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadások
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 


#### Eset 7 - Topic visszaadás
- **A teszt-eset leírás és célja:** Get topic működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadások ellenőrzése
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 

### afp/domain/EMCAnswer 
	
#### Eset 1 - Base öröklése
- **A teszt-eset leírás és célja:** A base modell öröklődése
- **A tesztelt folyamat/funkció leírása:** Is base modell
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:** 
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 

#### Eset 2 - Válasz beállítása
- **A teszt-eset leírás és célja:** Set answer működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadás
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 

#### Eset 3 - Válasz lekérdezése
- **A teszt-eset leírás és célja:** Get answer működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadás ellenőrzése
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 


#### Eset 4 - Helyesség beállítása
- **A teszt-eset leírás és célja:** Set is correct működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadás
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 


#### Eset 5 - Helyesség lekérdezése
- **A teszt-eset leírás és célja:** Get is correct működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadás ellenőrzése
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 


#### Eset 6 - Parent id beállítás
- **A teszt-eset leírás és célja:** Set parent id működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadás
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 


#### Eset 7 - Parent id visszaadás
- **A teszt-eset leírás és célja:** Get parent id működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadás ellenőrzése
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 

### Afp\Domain\ExerciseDilemmaDilemma 
	
#### Eset 1 - Base öröklése
- **A teszt-eset leírás és célja:** A base modell öröklődése
- **A tesztelt folyamat/funkció leírása:** Is base modell
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:** 
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 

#### Eset 2 - Válasz beállítása
- **A teszt-eset leírás és célja:** Set question működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadás
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 

#### Eset 3 - Válasz lekérdezése
- **A teszt-eset leírás és célja:** Get question működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadás ellenőrzése
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 


#### Eset 4 - Helyesség beállítása
- **A teszt-eset leírás és célja:** Set score működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadás
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 


#### Eset 5 - Helyesség lekérdezése
- **A teszt-eset leírás és célja:** Get score működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadás ellenőrzése
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 


#### Eset 6 - Parent id beállítás
- **A teszt-eset leírás és célja:** Set exercise id működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadás
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 


#### Eset 7 - Parent id visszaadás
- **A teszt-eset leírás és célja:** Get topic működés tesztelése
- **A tesztelt folyamat/funkció leírása:** Értékadás ellenőrzése
- **A tesztelés előfeltételei:** -
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	-
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** passed
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:** 

## Adatbázis

## Web Frontend
### Login funkció 
#### Eset 1 - Regisztráció működése
- **A teszt-eset leírás és célja:** Regisztráció siekres működése
- **A tesztelt folyamat/funkció leírása:** Regisztráció utáni oldal váltás.
- **A tesztelés előfeltételei:** Nincs.
- **A tesztelés dátuma és időpontja:** 2019.01.20 18:18
- **A tesztadatok típusa:**	Nincs
- **A tesztet végző személy(ek):** Botlik Roland
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Sikeres regisztráció esetén a főoldal betöltése, majd kijelentkezés után sikeres újboli bejelentkezés;
- **A tesztelés eredménye:** Megfelelt megjegyzésekkel
- **Megjegyzések:**	A sikeres regisztrációt követően még nem jelenik meg a bejelentkezett felhasználó e-mail címe a fejlécben, ki és bejelentkezés után már ott van, valószínű nem töltődik megfelelően a session.
	
#### Eset 2 - Login működése
- **A teszt-eset leírás és célja:** Login sikeres működése
- **A tesztelt folyamat/funkció leírása:** Login utáni oldal váltás.
- **A tesztelés előfeltételei:** Sikeres regisztráció
- **A tesztelés dátuma és időpontja:** 2019.01.20 18:21
- **A tesztadatok típusa:**	Szerver oldalon rögzített test userek.
- **A tesztet végző személy(ek):** Botlik Roland
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Sikeres login után főoldal betöltése.
- **A tesztelés eredménye:** Megfelelt
- **Megjegyzések:**	

#### Eset 3 - Hibajelzések megfelelő működése
- **A teszt-eset leírás és célja:** Login és Regisztráláskor elkövetett "hibák"
- **A tesztelt folyamat/funkció leírása:** Hiba jelzések arra a pontra mutatnak-e ahol a felhasználó a hibát vétette.
- **A tesztelés előfeltételei:** Nincs
- **A tesztelés dátuma és időpontja:** 2019.01.20 18:23
- **A tesztadatok típusa:**	Szerver oldalon rögzített test userek.
- **A tesztet végző személy(ek):** Botlik Roland
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Hibák előugrása hibás adat bevitelekor
- **A tesztelés eredménye:** Nem felelt meg
- **Megjegyzések:**	A sikeres tevékenységekre jön csak "reakció", de ha hibát vétünk, nem kapunk visszajelzést, csak nem történik meg az adott funkció (regisztráció vagy bejelentkezés).

#### Eset 4 - Formátum
- **A teszt-eset leírás és célja:** Formátumok tesztelése.
- **A tesztelt folyamat/funkció leírása:** Login oldalról a főoldalra navigálás
- **A tesztelés előfeltételei:** Sikeres login
- **A tesztelés dátuma és időpontja:** 2019.01.20 18:27
- **A tesztadatok típusa:**	Szerver oldalon rögzített test userek.
- **A tesztet végző személy(ek):** Botlik Roland
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Login oldalról a főoldalra navigálás
- **A tesztelés eredménye:** Megfelelt
- **Megjegyzések:**	


## Android Frontend

### Login funkció (LoginAcitivity.java)
	
#### Eset 1 - Login működése(LoginAcitivity.java)
- **A teszt-eset leírás és célja:** Login megfelelő működése
- **A tesztelt folyamat/funkció leírása:** Login utáni oldal váltás.
- **A tesztelés előfeltételei:** Nincs
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített test userek.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Sikeres login után főoldal betöltése.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	
	
#### Eset 2 - Regisztráció működése
- **A teszt-eset leírás és célja:** Regisztráció megfelelő működése
- **A tesztelt folyamat/funkció leírása:** Regisztráció utáni oldal váltás.
- **A tesztelés előfeltételei:** Nincs.
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Nincs
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Sikeres regisztráció esetén a főoldal betöltése
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	
	
#### Eset 3 - Hibajelzések megfelelő működése
- **A teszt-eset leírás és célja:** Login és Regisztráláskor elkövetett "hibák"
- **A tesztelt folyamat/funkció leírása:** Hiba jelzések arra a pontra mutatnak-e ahol a felhasználó a hibát vétette.
- **A tesztelés előfeltételei:** Nincs
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített test userek.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Hibák előugrása hibás adat bevitelekor
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	

#### Eset 4 - Formátum
- **A teszt-eset leírás és célja:** Formátumok tesztelése.
- **A tesztelt folyamat/funkció leírása:** Login oldalról a főoldalra navigálás
- **A tesztelés előfeltételei:** Nincs
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített test userek.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Gombok pirossal jelennek meg illetve háttér betöltése.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	
	
### Főoldal (MainAcitivity.java)

#### Eset 1 - Gombok betöltése
- **A teszt-eset leírás és célja:** Gomb adatok letöltése
- **A tesztelt folyamat/funkció leírása:** A gombok a login oldalváltása után megjelennek.
- **A tesztelés előfeltételei:** Belépett felhasználó, szerver kapcsolat, elérhető topic-ok. 
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített teszt adatok.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Megfelelő mennyiségű gomb jelenik meg.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	
	
#### Eset 2 - Gombok működése
- **A teszt-eset leírás és célja:** Gombok megfelelő helyre irányítása
- **A tesztelt folyamat/funkció leírása:** Gomb lenyomása után oldalváltás.
- **A tesztelés előfeltételei:** Belépett felhasználó, szerver kapcsolat, elérhető topic-ok/gombok. 
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített teszt adatok.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** A gombok a nevükkel megegyező topicra irányítanak.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	

#### Eset 3 - Menüsor működése
- **A teszt-eset leírás és célja:** Menüsor előhozatala
- **A tesztelt folyamat/funkció leírása:** Képernyő bal oldaláról ujjal való huzás.
- **A tesztelés előfeltételei:** Belépett felhasználó, szerver kapcsolat, elérhető topic-ok/gombok. 
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített teszt adatok.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Megjelenik a menüsor
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	


#### Eset 4 - Menüsor elemek
- **A teszt-eset leírás és célja:** Menüsor elemeinek működése
- **A tesztelt folyamat/funkció leírása:** Menü elemek megnyomása esetén oldal navigálás/művelet végzés.
- **A tesztelés előfeltételei:** Belépett felhasználó, szerver kapcsolat, elérhető topic-ok/gombok. 
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített teszt adatok.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** A kiválasztott menü elem lenyomásakor a hozzá tartzó szöveggel megeggyező feladatot hajt végre.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	
	
#### Eset 5 - Formátum
- **A teszt-eset leírás és célja:** Fromátumok tesztelése.
- **A tesztelt folyamat/funkció leírása:**	Gomb képek.
- **A tesztelés előfeltételei:** Belépett felhasználó, szerver kapcsolat, elérhető topic-ok/gombok. 
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített teszt adatok.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** A gomb a topic-val megegyező képpel jelenik meg.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	

### Tananyagok listája (tananyagok.java)

#### Eset 1 - Gombok betöltése
- **A teszt-eset leírás és célja:** Gomb adatok letöltése
- **A tesztelt folyamat/funkció leírása:** A gombok a kiválasztott topic után oldalváltás. Szövegek megjelenése.
- **A tesztelés előfeltételei:** Belépett felhasználó, szerver kapcsolat, elérhető topic-ok. 
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített teszt adatok.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Megfelelő tananyag cím megjelenése.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	
	
#### Eset 2 - Gombok működése
- **A teszt-eset leírás és célja:** Gombok megfelelő helyre irányítása
- **A tesztelt folyamat/funkció leírása:** Gomb lenyomása után oldalváltás.
- **A tesztelés előfeltételei:** Belépett felhasználó, szerver kapcsolat, elérhető tananyag-ok/gombok. 
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített teszt adatok.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** A gombok a nevükkel megegyező tananyag-ra irányítanak.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	


#### Eset 3 - Formátum
- **A teszt-eset leírás és célja:** Fromátumok tesztelése.
- **A tesztelt folyamat/funkció leírása:**	Gomb szöveg.
- **A tesztelés előfeltételei:** Belépett felhasználó, szerver kapcsolat, elérhető topic-ok/gombok. 
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített teszt adatok.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** A gomb a topic-val megegyező képpel jelenik meg.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	


### Tananyag (Tananyag.java)

#### Eset 1 - Cím
- **A teszt-eset leírás és célja:** Cím betöltés és megjelenítés tesztelése.
- **A tesztelt folyamat/funkció leírása:** A tananyagok oldalról egy tananyagra navigálunk.
- **A tesztelés előfeltételei:** Belépett felhasználó, szerver kapcsolat, elérhető tananyagok és ahhoz kapcsolódó tananyag. 
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített teszt adatok.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Az oldal első sorában megjelenik az adott tananyag címe.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	

#### Eset 2 - Tartalom
- **A teszt-eset leírás és célja:** Tartalom betöltés és megjelenítés tesztelése.
- **A tesztelt folyamat/funkció leírása:**	A tananyagok oldalról egy tananyagra navigálunk.
- **A tesztelés előfeltételei:** Belépett felhasználó, szerver kapcsolat, elérhető tananyagok és ahhoz kapcsolódó tananyag. 
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített teszt adatok.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Az oldal második sorától kezdve megjelenik az adott tananyag tartalma.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	

#### Eset 3 - Formátum
- **A teszt-eset leírás és célja:** Fromátumok tesztelése.
- **A tesztelt folyamat/funkció leírása:**	A tananyagok oldalról egy tananyagra navigálunk.
- **A tesztelés előfeltételei:** Belépett felhasználó, szerver kapcsolat, elérhető tananyagok és ahhoz kapcsolódó tananyag. 
- **A tesztelés dátuma és időpontja:**
- **A tesztadatok típusa:**	Szerver oldalon rögzített teszt adatok.
- **A tesztet végző személy(ek):**
- **A tesztelt rendszer beállításai:**
- **A teszt-eset elvárt eredménye:** Az oldal első sora (cím) nagyobb betűvel telenik meg mint a tartalom.
- **A tesztelés eredménye:** Megfelelt / Nem felelt meg / Megfelelt megjegyzésekkel
- **Megjegyzések:**	
