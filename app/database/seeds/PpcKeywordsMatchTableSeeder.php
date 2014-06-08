<?php

class PpcKeywordsMatchTableSeeder extends Seeder
{

    const DB_PPC_KEYWORDS_MATCH = 'ppc_keywords_match';

    public function run()
    {

        DB::table(self::DB_PPC_KEYWORDS_MATCH)->delete();

        DB::table(self::DB_PPC_KEYWORDS_MATCH)->insert(array(
            'id' => 1,
            'pozitive' => 1,
            'code' => 'broad',
            'string_before' => '',
            'string_after' => '',
            'desc' => 'Broad match; query must contain all words from keyword, in any order (default)'
        ));

        DB::table(self::DB_PPC_KEYWORDS_MATCH)->insert(array(
            'id' => 2,
            'pozitive' => 1,
            'code' => 'phrase',
            'string_before' => '"',
            'string_after' => '"',
            'desc' => 'Phrase match ("keyword"); keyword must match query with words in correct order'
        ));

        DB::table(self::DB_PPC_KEYWORDS_MATCH)->insert(array(
            'id' => 3,
            'pozitive' => 1,
            'code' => 'exact',
            'string_before' => '[',
            'string_after' => ']',
            'desc' => 'Exact match ([keyword]); keyword must match exactly entire query'
        ));

        DB::table(self::DB_PPC_KEYWORDS_MATCH)->insert(array(
            'id' => 4,
            'pozitive' => 0,
            'code' => 'negativeBroad',
            'string_before' => '-',
            'string_after' => '',
            'desc' => 'Negative broad match (-keyword); query must not contain words from this keyword'
        ));

        DB::table(self::DB_PPC_KEYWORDS_MATCH)->insert(array(
            'id' => 5,
            'pozitive' => 0,
            'code' => 'negativePhrase',
            'string_before' => '-"',
            'string_after' => '"',
            'desc' => 'Negative phrase match (-"keyword"); query must not contain keyword words in correct order'
        ));

        DB::table(self::DB_PPC_KEYWORDS_MATCH)->insert(array(
            'id' => 6,
            'pozitive' => 0,
            'code' => 'negativeExact',
            'string_before' => '-[',
            'string_after' => ']',
            'desc' => 'Negative exact match (-[keyword]); query must not exactly match this keyword'
        ));

    }
}