# Git Mankó

Jelen dokumentum csak egy rövid összefoglaló, amit referenciaként használhasz. 
Ha a következő kérdésekre keresed a választ, akkor először [ezt olvasd el](git_tutorial.md)!

1. Hogyan telepítsem a git-et?
2. Hogyan kezdjem el a git használatát?
3. Miért fontos a munkafolyamat szabályainak a betartása, és egyáltalán miért van erre szükség?

- [Git alapok (telepítés, leírás kezdőknek](git_tutorial.md)
- [Git cheatsheet - tartsd kéznél](https://services.github.com/on-demand/downloads/github-git-cheat-sheet.pdf)

## Mielőtt bármit is tennél

- Olvasd el a tájékoztatókat!
- Hozz létre egy repót a gépeden (nem kell GitHub), és gyakorolj egy kicsit!
- Ezeket mindenképp értsd meg és gyakorold egy kicsit! Vizsgáld meg a paraméterezési lehetőségeket is!

	- git init
	- git status
	- git add
	- git commit
	- git branch
	- git checkout
	- git merge
	- git push

- Hozz létre fájlokat, add hozzá s repóhoz, commitold. Hozz létre új branchet, checkoutold. 
- A lépések előtt és után is vizsgáld meg a repód tartalmát (így fog letisztulni a branch-ek máködése)!
- Tedd meg ezt úgy is, hogy van commit-ra váró módosítás a kiinduló branch-ben!

## Szöveges fájlok a GitHubon - dokumentáció készítés

- Ne használj ékezeteket és szóközöket a fájlnevekben!
- A formázandó dokumentum kiterjesztése legyen .md !
- [Git vezérlőkarakterek](https://help.github.com/articles/basic-writing-and-formatting-syntax/)
- Figyelem: a fenti szabályok betartásával kizárólag a GitHub webes felületén éred el a kívánt eredményt, 
  lokális környezetben hagyományos txt fájlként fog viselkedi a dokumentum.

## .gitignore - a fájlok és mappák, amiket nem akarsz bedobni a közösbe


- Ha használsz bármi olyan fejlesztői eszközt, ami mappákat, fájlokat generál a munkakönyváradba, 
	akkor az első git add parancs előtt egészítsd ki a .gitignore file-t az eszközre mappáira vonatkozó hivatkozásokkal!
- Ha ezt nem teszed meg, akkor felül fogjátok írni egymás lokális config/cache fájljait.
- A .gitignore file első blokkja tartalmazza az ignorált IDE-k és eszközök neveit, ha módosítod a fájlt, ezt a listát is módosítsd!

## Git munkafolyamat

A projekt sikere érdekében, [az itt található](https://nvie.com/posts/a-successful-git-branching-model/), 
jól bevált munkafolyamat egyszerűsített változatát fogjuk alkalmazni.

**A lépések betartása kiemelten fontos.** Elhagyásuk esetén már egy nálunk kisebb létszámú, és jóval tapasztaltabb fejlesztői csapat 
is komoly problémákba ütközhet. A lépések végrehajtásáról részletesen olvashatsz a [Git alapok fejezetben](git_tutorial.md) fejezetben.


A folyamat:

	1. Ne kezdd el a fejlesztést, **még egy fájnevet se írj át, egy mappát se hozz létre**, 
		amíg az adott pont nem ad rá utasítást!
	2. Git repó klónozása.
	3. Váltás a develop branchre. **NE HAGYD KI**
	4. Adj nevet a fejlesztendő feladatnak, és hozz létre hozzá egy branch-et! 
		Hogy mi számít elkülöníthető feladatnak, és az elnevezéssel kapcsolatos 
		konvenciókat beszéljétek meg a csoportotok vezetőjével!
	5. **Most kezdheted a fejlesztést!** 
	6. Ha úgy gondolod, hogy a munkád publikálható (commitálható), akkor hajts végre egy **commit**-ot!
	7. Válts vissza a develop branch-re, mergeld vissza a feature branchedet, majd töröld azt!
	   Ne aggódj, a munkád nem fog elveszni, csak az ágak elkülönítés szűnik meg ilyenkor. 
		(Természetesen van lehetőség telljes törlésre is, de ez nem ide tartozik)
	8. A develop branche-t pushold a GitHub repóba (szükség esetén pull és konfliktus feloldás)!
	9. Minden egyes jól elkülöníthető feladatra ismételd a 4-8 pontokat!

A fenti szabályok talán szigorúnak tűnnek, de mindenképp megéri betartani őket. Ha ezt a 9 pontot következetesen, 
algoritmikus módon alkalmazod, akkor nagyon hamar belejösz, és nem fog nehézséget okozni.

Egy újabb fontos szabály: **Ne pusholj, amíg nem ellenőrzöd meg a repód állapotát!** (A részletes leírásban megtalálod a módját is)

Mit tegyek, ha mégis kihagytam valamit?

	1. Don't Panic :) A commitált módosításaid nem vesznek el, és amíg lokális környezetben dolgozol másnak sem tudsz gondot okozni.
	2. Ha nem a megfelelő branchben kezdtél el dolgozni, akkor egyszerűen válts át a helyes branchre, és folytasd a munkát.
	3. Csak akkor commit-olj, amikor biztos vagy abban, hoyg minden a helyén van. Ilyenkor viszont azonnal!!!
	
	
  
