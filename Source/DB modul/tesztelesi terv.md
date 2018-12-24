###Tesztelési terv 

AFP-LEV-A Project

Dokumentum címe: (azonosítója)	
Minősítés: (állapot)
(tervezet, jóváhagyott, stb.)	
Verziószám:	
Projekt név:	
Készítette:	
Telefon:	
Utolsó mentés kelte:	
Dokumentum célja:	
Fájlnév:	

Változtatások jegyzéke
Verzió	Dátum	Készítette	Megjegyzés
			
			
			
			

A dokumentumot megkapják
Funkció



1	Bevezetés

Ebben a fejezetben a tesztterv célja, hatóköre és felépítése található.
1.1	Tesztelési terv hatóköre, célja 

A tesztelési terv célja a tesztelés teljes körűségének biztosítása, a tesztelés során alkalmazott eljárások és megoldások meghatározásával.

A teszt végrehajtásáért a projekt menedzser felel <projekt menedzser neve>, és a tesztcsapat hajtja végre a 2.1. fejezetben meghatározott módon.

1.2	Elvárások

 Az alábbi alap elvárások képezik ennek a teszttervnek az alapját:
•	Az olvasó ismeri az alapdokumentumokat, amelyek meghatározzák a rendszert. 
•	Az xxx szervezeti egység/ projektcsapat felelős a tesztadatok előállításáért.  
•	A tesztprogram az ebben a dokumentumban meghatározott tesztterv alapján fut. 

2	Szükséges erőforrások

Ez a fejezet a teszteléshez szükséges erőforrásokat fejti ki. 
2.1	Feladatkörök és felelősségek (tesztcsapat meghatározása)

Feladatkörök és felelősségek
Feladatkör	Felelősség/tevékenység	Személy
Tesztelő:		A teszt végrehajtása
	Észrevételek dokumentálása
	Teszt dokumentáció archiválása	
Szakértő:	A szakértő az észrevételek elemzi és megoldást javasol.	
Teszt-koordinátor:		Teszt terv készítése
	A tesztterv jóváhagyatása a projektmenedzserrel
	Teszt forgatókönyvek létrehozása
	Inkonzisztenciák kezelése 
	Helyes és időbeni hibakezelés 
	Szükség esetén problémák eszkalálása a projekt menedzsernek 
	Végső riport készítése
	Teszt dokumentum archiválása
	Az észrevételek státuszának követése, ill. dokumentálása	
Projektvezető:		Teszt terv jóváhagyása 
	Teszt forgatókönyv (testscript)	

2.2	Tesztkörnyezet

Ebben a részben meg kell határozni, hogy a tesztelés milyen környezetben történjen (fejlesztői vagy tesztkörnyezet), a környezetek hogyan érhetőek el, továbbá a tesztelők milyen hozzáféréssel végezzék a tesztelést.

Tesztkörnyezet
Környezet neve és feladata	A hozzáférés módja	Konfiguráció	Kapcsolattartó személyek
			
			
			
3	Tesztelési terv

Ez a fejezet leírja a teszt típusát, a metodológiáját és a riport készítés módszerét. Emellett meghatározza a teszt elvárásokat, a teszt-esetek elvárt eredményeit, sikerességének kritériumait, a kockázatok kezelését és a hatáskörön kívül eseteket.
3.1	Fejlesztői teszt

A fejlesztői tesztelés célja a rendszer alapvető funkcióinak ellenőrzése, a hibakezelés és az alapvető funkciók működésének vizsgálata. Módszere:...
3.2	Prototípus (modul) teszt

A prototípustesztelés (vagy másik nevén modultesztelés) célja a rendszer már működő moduljainak önálló tesztelése, a modulon belüli hibák azonosításának és kiküszöbölésének érdekében. Módszere:...

4	Tesztelési jegyzőkönyv és tesztelési jelentés
4.1	Tesztelési jegyzőkönyv

A tesztelők a tesztforgatókönyvnek megfelelően elvégzik a tesztelést és az eredményt tesztjegyzőkönyvekben dokumentálják. A teszt kimenetelést minden esetben jelenteni kell a tesztkoordinátornak. A tesztkoordinátor a szakértőkkel együtt megoldást keres a problémákra, majd frissíti a tesztforgatókönyvet. Ha a problémát megoldották, a tesztelő újrakezdheti a tesztelést, majd dokumentálja az eredményeket. Ha a hiba továbbra is fennáll, és harmadik félen múlik a megoldása eszkalálni kell a problémát a projekt menedzsernek. 
4.2	Tesztelési jelentés

A tesztelési jelentést a tesztkoordinátor készíti el. Ez egy részletes áttekintése a lefutott teszteknek, azok eredményeinek, státuszának és a megjegyzéseknek.
A tesztkoordinátor juttatja el a projektmenedzsernek a tesztelési jelentést. 
4.3	Tesztelt elvárások 

Az alábbi funkcionális elvárások szerepelnek az üzleti illetve fejlesztői specifikációban, amelyek tesztelésre is kerültek: 

#	Leírás
1.	
2.	
3.	
4.	
5.	
6.	
7.	

Az alábbi nem-funkcionális elvárások szerepelnek az üzleti illetve fejlesztői specifikációban, amelyek tesztelésre is kerültek: 

#	Leírás
1.	
2.	
3.	
4.	

Az alábbi elvárások szerepelnek az üzleti illetve fejlesztői specifikációban, amelyek nem kerültek tesztelésre: 

4.4	Elfogadási kritériumok

A teszt sikerességének kritériumai:
	Technikai, a teszt forgatókönyvben leírtak szerint. 
	A projekt menedzser jóváhagyása a teszt leszállítandókra. 
4.5	Kockázat kezelés

#	Kockázat	Hatás
(magas/közepes/
alacsony)	A kockázat kezelésének módja
1.			
2.			
3.			

Tesztelési jelentés*




	Megfelelt/élesíthető
	Nem felelt meg
	Megfelelt megjegyzésekkel

