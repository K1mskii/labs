#!D:\xampp\perl\bin\perl.exe
     print "Content-Type: text/html\n\n"; 
$path = "d:/xampp/htdocs";
$FILE_NEWS=$path.'/txt/bulletin.txt';
open(LIST,"<$FILE_NEWS");
@lines=<LIST>;
close(LIST);
#HTML-include:
print <<EOT;
<html>
	<body  bgcolor='#FFFFFF'  leftmargin='0'>
		<table  border="0" cellspacing="0" cellpadding="20">
			<tr>
				<td><p class="just"><font color='#00007b' size='4'>@lines</font></p></td>
			</tr>
		</table>
	</body>
</html>
EOT
exit;
