var xmldoc = new ActiveXObject("msxml");
var xmlsrc = "ok.xml";
function viewTitle(elem) { // Отображение заголовка документа, определяемого элементом <title>
	this.document.writeln('<center><table width="100%" border=0><tr><td width="100%" align="center" bgcolor="silver"><b><font color="black">'+elem.text+'</font></b></td></tr></table></center><br>');
}
function viewContactsList(elem) { // Отображение содержимого дочерних элементов <author-list>
	this.document.writeln('<tr><td align="right" colspan="2" bgcolor="gray"><b><font color="white">Наши реквизиты</font></b></td></tr>');
	this.document.writeln('<tr><td bgcolor="silver" colspan="2"><center><table width="80%" border=0>');
	if(elem.type==0) {
		if(elem.children!=null) {
			this.document.writeln('<tr><td colspan=2 width="100%"> </td></tr>');
			var cur_item=elem.children.item("address");
			if(cur_item!=null) {
				this.document.writeln('<tr><td><font color="blue">Адрес</font></td><td align="right" ><b><font color="red">'+cur_item.text+'</font></b></td></tr>');
			}
			var cur_item=elem.children.item("tel",0);
			if(cur_item!=null) {
				this.document.writeln('<tr><td><font color="blue">Телефон</font></td><td align="right" ><b><font color="red">'+cur_item.text+'</font></b></td></tr>');
			}
			var cur_item=elem.children.item("email");
			if(cur_item!=null) {
			this.document.writeln('<tr><td><font color="blue">E-Mail</font></td><td align="right"><b><font color="red">'+cur_item.text+'</font></b></td></tr>');
			}
			var cur_item=elem.children.item("url");
			if(cur_item!=null) {
				this.document.writeln('<tr><td><font color="blue">URL</font></td><td align="right"><b><font color="red">'+cur_item.text+'</font></b></td></tr>');
			}
		}
	}
	this.document.writeln('<tr><td colspan=2 width="100%"> </td></tr>');
	this.document.writeln('</table></center></td></tr>');
}


function viewAuthorsList(elem){ // Отображение содержимого дочерних элементов <author-list>
	this.document.writeln('<tr><td align="right" colspan="2" bgcolor="gray"><b><font color="white">Наши студенты</font></b></td></tr>');
	this.document.writeln('<tr><td bgcolor="silver" colspan="2"><center><table width="80%" border=0>');
	if(elem.type==0) {
		if(elem.children!=null){ 
			for(i=0;i<elem.children.length;i++) {
				var cur_author = elem.children.item("author",i);
				this.document.writeln('<tr><td colspan=2 width="100%"> </td></tr>');
				if(cur_author.children!=null) {
					var cur_item=cur_author.children.item("firstname");
					if(cur_item!=null) {
						this.document.writeln('<tr><td><font color="blue">Имя</font></td><td align="right" ><b><font color="red">'+cur_item.text+'</font></b></td></tr>');
					}
					var cur_item=cur_author.children.item("lastname");
					if(cur_item!=null) {
						this.document.writeln('<tr><td><font color="blue">Фамилия</font></td><td align="right" ><b><font color="red">'+cur_item.text+'</font></b></td></tr>');
					}
					var cur_item=cur_author.children.item("email");
					if(cur_item!=null) {
						this.document.writeln('<tr><td><font color="blue">E-Mail</font></td><td align="right"><b><font color="red">'+cur_item.text+'</font></b></td></tr>');
					}
				}
			}
		} 
	}
	this.document.writeln('</table></center></td></tr>');
}


function viewError() {
	this.document.writeln('<center><hr>Error was detected');
}

function parse(root) {
	if(root==null) return;
		var i=0;
		var elem; 
		if(root.children!=null) { // Если вложенные элементы не были определены, то свойство children будет установленно в null
			this.document.writeln('<center><table width="80%" border=0><tr><td>');
			// Перебор дочерних элементов
			for(i=0;i<root.children.length;i++){
				elem=root.children.item(i);
				if(root.children.item(i).tagName=="TITLE"){
					viewTitle(elem); // Разбор подэлементов <title>
				}

				if(elem.tagName=="CONTACTS"){
					viewContactsList(elem); // Разбор подэлементов <contacts>
				}
				if(elem.tagName=="AUTHORS-LIST"){
					viewAuthorsList(elem); // Разбор подэлементов <authors-list>
				} 
			}
			this.document.writeln('</td></tr></table>');
		} 
	}

function viewDocument() {
	xmldoc.URL = xmlsrc; // Загрузка XML документа
	this.document.writeln('<body bgcolor="white">');
	parse(xmldoc.root); // Начало разбора документа
	this.document.writeln('</body>');
}

// Генерирование страницы
viewDocument();
