<? ob_start(); ?>

<?
function guidv4($uuidata = null)
{
    // Generate 16 bytes (128 bits) of random uuidata or use the uuidata passed into the function.
    $uuidata = $uuidata ?? random_bytes(16);
    assert(strlen($uuidata) == 16);

    // Set version to 0100
    $uuidata[6] = chr(ord($uuidata[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $uuidata[8] = chr(ord($uuidata[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($uuidata), 4));
}

$uuid4 = guidv4();
// echo $uuid4; // Output