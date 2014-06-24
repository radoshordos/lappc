<?php

namespace Authority\Feed\Shop;

class HyperzboziCz extends FeedAbstract
{


}

/*
PRODUCT	- stručný název zadávaného výrobku – povinný údaj

URL	-www adresa odkazující přímo na stránku s nabídkou daného produktu - povinný údaj
IMGURL	-www adresa odkazující přímo na obrázek produktu - povinný údaj
PRICE_VAT	-cena produktu s DPH - nepovinné v případě, že jsou zadány hodnoty PRICE a VAT
DUES	-poplatky které je nutné zaplatit při koupi zboží (autorské a recyklační poplatky, nikoliv však doprava a balné) – nepovinný údaj v případě, pokud jsou tyto poplatky již obsaženy v ceně výrobku - PRICE resp. PRICE_VAT
EAN	-čárový kód, prostředek pro automatizovaný sběr dat - nepovinný údaj
ISBN	-alfanumerický kód určený pro jednoznačnou identifikaci knižních vydání - nepovinný údaj
CATEGORYTEXT	-textový popis kategorie, do které ve svém obchodu produkt zařazujete, uvádějte celou cestu k cílové kategorii - povinný údaj
DISCUSSION_SIZE	-počet příspěvků v diskuzi k výrobku - nepovinný údaj
DISCUSSION_URL	-www adresa do diskusního fóra - nepovinný údaj
TOLLFREE	-položka TOLLFREE s hodnotou 1 vyloučí konkrétní zboží ze systému PPC a kliknutí na něj zůstanou bezplatná a nebude se u něj uplatňovat přednostní výpis. Používá se u zboží, u kterého nechcete platit za proklik např. z důvodu jeho nízké ceny. Položku TOLLFREE je možné použít jen u zboží s cenou do 40 Kč. - nepovinný údaj
