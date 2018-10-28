# Rendszerspecifikáció

A követelményspecifikációban megfogalmazott feladatok elkészítés több ütemben készül el.
Az ütemterv első része az alábbiakat tartalmazza.	

## A rendszerrel szemben támasztott általános követelmények
- A rendszer funkcióit csak bejelentkezett felhasználó használhatja.
- Webes, bizonyos funkciókhoz androidos felület.
- Adattárolás MySQL adatbázison.

## Az alkalmazásokkal szemben támasztott funkcionális követelmények
- Felhasználókezelés
	- Tanár
	- Tanuló

## Funkcionális követelmények
### Tanár által elérhető funkciók
- vihet fel a rendszerbe webes felületen keresztül:
 	- témaköröket (matek, infó, fizika stb)
	- tananyagot (az egyes témakörökhöz)
	- tesztanyagot (feladatok)

## Felülettel szemben támasztott követelmények
- Web - az elkészített prototípusnak megfelelő
- Android
	- Bejelentkező ablak diákoknak
	- Témakör választó ablak
	- Témakörön belül tananyag választó ablak
	- Tananyag megtekintés ablak

**Tesztanyagok:**
- A tananyag szövege alapján igaz hamis állításokat fogalmaz meg: igaz-hamis.
- Tananyag szövege alapján a megoldások közül egy, vagy több megoldás kiválasztása.

### Tanuló által elérhető funkciók (webes és androidos felület)
- témakörválasztás
- témakörön belül: tananyag, ill. tesztanyag választás
- tananyag megtekintése
- tesztanyag megtekintése
	
x - Adatvédelem
x - Hardver elemekkel kapcsolatos követelmények

--------------------------------------

## Adatbázis terv

Karakterkódolás UTF8.
Tábla és mezőneveknél PascalCase konvenciót alkalmazunk, ill. a mező nevek egy X_ prefixet kapnak, ahol az X a tábla nevében lévő karakterek.
PK - alapból autoincrement, ha más nincs megadva.
mezők - ahol nincs megadva, ott az alapparaméterek: not null 
FK - kapcsoló mezők konvenciója: X_Y_ID, ahol X az alaptábla és Y a kapcsolt tábla.

Táblák:
- Felhasználó tábla
	- táblanév: User
	- mező nevek:
		- U_ID, PK 
		- U_LoginName, UQ
		- U_Name,
		- U_Email,
		- U_Pass, SHA128
		- U_Type (Admin, Tanár, Diák)
		
- Témakör tábla
	- táblanév: Topic
	- mező nevek:
		- T_ID, PK
		- T_Name, UQ (pl. Matek, Angol, Történelem stb.)
		- T_Desc, null

- Tananyag tábla
	- táblanév: Curiculum
	- mező nevek: 
		- C_ID, PK
		- C_T_ID, FK
		- C_Title (Tananyag címe)
		- C_Content (text)

- Feladatok tábla
	- táblanév: Excersise
	- mező nevek:
		- E_ID, PK
		- E_T_ID, FK

- Igen/nem felelet választó feladatok tábla
	- táblanév: ExcersiseDilemma
	- mező nevek:
		- ED_ID, PK
		- ED_E_ID, FK
		- ED_Question
		- ED_YesNo (Bool)
		
- Felelet választó feladatok tábla
	- táblanév: ExcersiceMultipleChoise
	- mező nevek:
		- EMC_ID, PK
		- EMC_E_ID, FK
		- EMC_Question
		
- Felelet választó feladatok válaszai tábla
	- táblanév: EMCAnswer
	- mező nevek:
		- EMCA_ID, PK
		- EMCA_EMC_ID, FK
		- EMCA_Answer
		- EMCA_IsCorrect (bool)
		
- Tesztlisták tábla
	- tábla neve: TestList
	- mező nevek:
		- TL_ID, PK
		- TL_Title
		- TL_U_ID, FK (tanár)
		
- Igen/Nem teszt
	- tábla neve: EDTest
	- mező nevek:
		- EDT_ID, PK
		- EDT_TL_ID, FK
		- EDT_ED_ID, FK
		
- Felelet választó teszt
	- tábla neve: EMCTest
	- mező nevek:
		- EMCT_ID, PK
		- EMCT_TL_ID, FK
		- EMCT_ED_ID, FK

- Tanulók által kitöltött teszt eredmények tábla
	- tábla neve: Test
	- mező nevek:
		- TE_ID, PK
		- TE_U_ID, FK (tanulók)
		- TE_TL_ID, FK
		- TE_Score
		
##Funkció terv

1. Bejelentkezés/regisztráció/jelszócsere
- Web
	- Tanár
	- Diák
- Android
	- Diák

Csak tanár funkciókhoz
----------------------

Csak webes felület szolgáltatja ezeket a funkciókat.

2. Témakör felvétele, szerkesztése, törlése
3. Tananyag felvétele, szerkesztése, törlése
4. Igen/Nem feladat felvétele, szerkesztése, törlése
5. Felelet választós feladat felvétele, szerkesztése, törlése
6. Feladatsor felvétele, szerkesztése, törlése
7. Diákok pontszámainak megtekintése

Tanár, diák funkciók
--------------------

8. Téma választás
9. Tananyag választás, megtekintés
10. Teszt listából teszt választás és megnézés

Csak diák funkciók
------------------

11. Teszt listából teszt választás és megoldás
