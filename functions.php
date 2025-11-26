<?php 

// Napravi funkciju processString sa dva parametra $input i $operation
function processString($input, $operation) {

  switch ($operation ) {
    case 'uppercase':
      return strtoupper($input);
    case 'lowercase':
      return strtolower($input);
    case 'firstcap':
      return ucfirst($input);
    default:
      return 'Provide a case to return';
  }

}

// Ispis izgleda ovako
?>
<?php //echo processString( 'Hello world', 'uppercase' );?>

<?php //echo processString( 'Hello world', 'firstcap' );?>
<?php //echo processString( 'Hello world', 'lowercase' );?>

<?php
// Napiši PHP funkciju formatText($text, $operation) koja vrši transformaciju stringa.
// Funkcija treba da unutar sebe definiše pomoćne metode koje obavljaju konkretne poslove.
// - "slug" – pretvara tekst u URL-friendly slug

// - "initials" – vraća inicijale iz imena i prezimena

// - "count_vowels" – vraća broj samoglasnika u stringu

// - "camelcase" – pretvara string u camelCase format

function formatText($text, $operation)
{
    // Pomoćna metoda: slugify
    $toSlug = function ($str) {
        $str = strtolower(trim($str));
        $str = preg_replace('/[^a-z0-9]+/', '-', $str);
        return trim($str, '-');
    };

    // Pomoćna metoda: initials
    $getInitials = function ($str) {
        $parts = explode(' ', trim($str));
        $initials = '';

        foreach ($parts as $p) {
            if (strlen($p) > 0) {
                $initials .= strtoupper($p[0]);
            }
        }

        return $initials;
    };

    // Pomoćna metoda: count vowels
    $countVowels = function ($str) {
        preg_match_all('/[aeiouAEIOU]/', $str, $matches);
        return count($matches[0]);
    };

    // Pomoćna metoda: camelCase
    $toCamelCase = function ($str) {
        $str = strtolower($str);
        $str = str_replace(['-', '_'], ' ', $str);
        $str = ucwords($str);
        $str = str_replace(' ', '', $str);
        return lcfirst($str);
    };

    // Logika glavne funkcije
    switch ($operation) {
        case 'slug':
            return $toSlug($text);

        case 'initials':
            return $getInitials($text);

        case 'count_vowels':
            return $countVowels($text);

        case 'camelcase':
            return $toCamelCase($text);

        default:
            return 'Nepoznata operacija.';
    }
  
}

// Primer poziva:
//echo formatText("John Doe", "initials") .'<br/>';      // JD
//echo formatText("Hello World Example", "slug") .'<br/>'; // hello-world-example
//echo formatText("programiranje", "count_vowels") .'<br/>'; // broj samoglasnika
//echo formatText("hello world", "camelcase") .'<br/>'; // helloWorld




