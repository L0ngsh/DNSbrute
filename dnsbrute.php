###########################################
#                                         #
#         dns-brute by L0ngui c:          #
#                                         #
#  php dnsbrute.php domain subdomain.txt  #
#                                         #
###########################################
<?php
// Checks if exist the first argument
if (!empty($argv[1])) {
	$host = $argv[1];
} else {
	echo "You need to specify a domain\n";
	exit;
}
// Checks if exist the second argument
if (!empty($argv[2])) {
       	$list = $argv[2];
} else {
  echo "You need to specify the subdomainlist\n";
  exit;
}
// Checks if the nsecond argument is a .txt file
if (!empty(file($list))) {
	$sublist = file($list);
} else {
  echo "the file is not a .txt\n";
  exit;
}
// Checks the host with all subdomains and print in terminal only the existents subdomains
$results = 0;
$qnt = count($sublist);
for ($i=0; $i < $qnt; $i++) {
  $sub = explode("\n", $sublist[$i]);
  $hostname = $sub[0].".".$host;
  $ip = gethostbyname($hostname);
  if ($ip != $hostname) {
    echo $hostname.": ".$ip."\n";
		$results ++;
	}
}
echo "###########################################\n";
echo $results." results.\n";
?>
