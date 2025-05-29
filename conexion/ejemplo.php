<?php



include('conecion/AESCrypto.php'); 
$originalString = '[USAR LA CADENA DEL EJEMPLO UNO]';
$key = '5dcc67393750523cd165f17e1efadd21'; //Llave de 128 bits
$encryptedString = AESCrypto::encriptar($originalString, $key); 


$encryptedString = "7jFNoL0ZOrKdASWTt5H8lJg8cOXLrhOS3+YOFR21hE+E8LJ3tqM52zibT6q8PjlBv0rE9Qn5RXdK6uCXPdACAt+AP8LVNftibeT4mGl9LxoymTdVBfL9y08/5N9qO7sPq3WTPMKqRn3uo7Pwlr38r9XoMGoOwQRaYavU/NO4Uhl4ULYRyP4S1m6ablmdmxx4aahq3craT83qmyhAw2jQq8N8N+lLYkfy+vl3OnqqaTMPCnDhnQx4OdQxI99R9fUBjHAPpvmqa9TZa6TIc/PD3mmCm8OiIHVo9gzB0Gxj+uh71GAgZ6uAvcqRoMhuNAnEivB5koxKfrXjDJp/nZZGILe3sk7o05+MaITsblWOUR7P1OikjtM86OyzglzMidB9ok2lSIVDM2v5USgz9LC/BtVJu7/r3+EixhB6GiVdvn27K28YatfUrSGT9bAo9o1/L7eneEiBvkZ5CV7isasY9PuH+5/nuhr6siBXTWW0Uc//dZG6xYRILLmEcGe+IqykXBDx5b+EDtyPdqI0jBzv9u8p6V+WXAkXXsl++Lg6hvIkGaMmDSIFmh2R5Pd42PK96ugqpIxnzylr/uCo7x4sYQbIiisW7HZ4rd0j09+FsTKyc3f+dwGhSXo+zqqrOtrslU79ohlZrc5W7zW39NjQCDi0C14q2KgXwTh/X4kFbViZWXaQvrvN3ERl03JiGaWAFT4cEDg/103MDMAekZQBMvSiQg6mk4AteN4s0t9Lz+dTVbHeM4NHkjTR6FIiEiUIa3z/MeT48A+gweyxFCPYxOzHKrDlRgzuuKIyMtVmGGbhm3h473ea2OIMkZ+nWN/0YqZ7GUYQC6DyMZe3rYD4pmyc62pZAaLC+EumwqH4pemWCOMLCJnrtjpAGuMHT1gpICzo28Z2c+oXpnsTSAJjQtZJ+N2Z8fInT1kd5cx5cZrLPotEZ/42RUCt6gWw0TShEJgpcA1x/iQxJtM988et9X8rqVXQTrvR4izydGn9EPC0oFiy3ZxH4kY5inQ2D29X188KZtkRYE4azlyApc345FewdLZFQDOJten24p5PaSt25FBHLmom+lNzyDlLXhrp"









$encodedString = urlencode('<pgs><data0>SNDBX123</data0><data>1OJAHMRu...IJiYtY5OnyQ==</data></pgs>');
$request = new HttpRequest();
$request->setUrl('https://wppsandbox.mit.com.mx/gen');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(  'cache-control' => 'no-cache',  'content-type' => 'application/x-www-form-urlencoded'));

$request->setContentType('application/x-www-form-urlencoded');
$request->setPostFields(array(  'xml' => encodedString));

try {
  $response = $request->send();
  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}

$response ="ab+DmpmFiv7b7xrUItE8yMV4qoV7Z2xm3NbCMxyOskUEfftfLMrQyTKQ6a18tFmx8vwS9kx3TvbsyR/apdsXWSq4oK19xK+/z5or3FqeGBgXZ4AFs1WsvyihZ5xKLl2yZNoAVSasMsSOa+3mQogj6a8UKdhy4od+z0IDzWbLhtcyrgKU3qGgbjfPxCRREPXRCf1/I8s/dI2J5WOTrfLREA=="

$originalString = $response;
$key = '5dcc67393750523cd165f17e1efadd21'; //Llave de 128 bits
$decryptedString = AESCrypto::desencriptar($originalString, $key);
echo $decryptedString;

?>