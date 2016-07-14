function SortableTable(B,A){this.sortTypes=A||[];this.sortColumn=null;this.descending=null;var C=this;this._headerOnclick=function(E){C.headerOnclick(E)};if(B){this.setTable(B);this.document=B.ownerDocument||B.document}else{this.document=document}var D=this.document.defaultView||this.document.parentWindow;this._onunload=function(){C.destroy()};if(D&&typeof D.attachEvent!="undefined"){D.attachEvent("onunload",this._onunload)}}SortableTable.gecko=navigator.product=="Gecko";SortableTable.msie=/msie/i.test(navigator.userAgent);SortableTable.removeBeforeSort=SortableTable.gecko;SortableTable.prototype.onsort=function(){};SortableTable.prototype.defaultDescending=false;SortableTable.prototype._sortTypeInfo={};SortableTable.prototype.setTable=function(A){if(this.tHead){this.uninitHeader()}this.element=A;this.setTHead(A.tHead);this.setTBody(A.tBodies[0])};SortableTable.prototype.setTHead=function(A){if(this.tHead&&this.tHead!=A){this.uninitHeader()}this.tHead=A;this.initHeader(this.sortTypes)};SortableTable.prototype.setTBody=function(A){this.tBody=A};SortableTable.prototype.setSortTypes=function(A){if(this.tHead){this.uninitHeader()}this.sortTypes=A||[];if(this.tHead){this.initHeader(this.sortTypes)}};SortableTable.prototype.initHeader=function(B){if(!this.tHead){return }var D=this.tHead.rows[0].cells;var F=this.tHead.ownerDocument||this.tHead.document;this.sortTypes=B||[];var A=D.length;var C,G;for(var E=0;E<A;E++){G=D[E];if(this.sortTypes[E]!=null&&this.sortTypes[E]!="None"){C=F.createElement("IMG");C.src="images/blank.png";G.appendChild(C);if(this.sortTypes[E]!=null){G._sortType=this.sortTypes[E]}if(typeof G.addEventListener!="undefined"){G.addEventListener("click",this._headerOnclick,false)}else{if(typeof G.attachEvent!="undefined"){G.attachEvent("onclick",this._headerOnclick)}else{G.onclick=this._headerOnclick}}}else{G.setAttribute("_sortType",B[E]);G._sortType="None"}}this.updateHeaderArrows()};SortableTable.prototype.uninitHeader=function(){if(!this.tHead){return }var B=this.tHead.rows[0].cells;var A=B.length;var D;for(var C=0;C<A;C++){D=B[C];if(D._sortType!=null&&D._sortType!="None"){D.removeChild(D.lastChild);if(typeof D.removeEventListener!="undefined"){D.removeEventListener("click",this._headerOnclick,false)}else{if(typeof D.detachEvent!="undefined"){D.detachEvent("onclick",this._headerOnclick)}}D._sortType=null;D.removeAttribute("_sortType")}}};SortableTable.prototype.updateHeaderArrows=function(){if(!this.tHead){return }var C=this.tHead.rows[0].cells;var A=C.length;var B;for(var D=0;D<A;D++){if(C[D]._sortType!=null&&C[D]._sortType!="None"){B=C[D].lastChild;if(D==this.sortColumn){B.className="sort-arrow "+(this.descending?"descending":"ascending")}else{B.className="sort-arrow"}}}};SortableTable.prototype.headerOnclick=function(B){var A=B.target||B.srcElement;while(A.tagName!="TD"){A=A.parentNode}this.sort(SortableTable.msie?SortableTable.getCellIndex(A):A.cellIndex)};SortableTable.getCellIndex=function(D){var B=D.parentNode.childNodes;var A=B.length;var C;for(C=0;B[C]!=D&&C<A;C++){}return C};SortableTable.prototype.getSortType=function(A){return this.sortTypes[A]||"String"};SortableTable.prototype.sort=function(C,G,A){if(!this.tBody){return }if(A==null){A=this.getSortType(C)}if(A=="None"){return }if(G==null){if(this.sortColumn!=C){this.descending=this.defaultDescending}else{this.descending=!this.descending}}else{this.descending=G}this.sortColumn=C;if(typeof this.onbeforesort=="function"){this.onbeforesort()}var H=this.getSortFunction(A,C);var I=this.getCache(A,C);var J=this.tBody;I.sort(H);if(this.descending){I.reverse()}if(SortableTable.removeBeforeSort){var E=J.nextSibling;var B=J.parentNode;B.removeChild(J)}var D=I.length;for(var F=0;F<D;F++){J.appendChild(I[F].element)}if(SortableTable.removeBeforeSort){B.insertBefore(J,E)}this.updateHeaderArrows();this.destroyCache(I);if(typeof this.onsort=="function"){this.onsort()}};SortableTable.prototype.asyncSort=function(C,A,D){var B=this;this._asyncsort=function(){B.sort(C,A,D)};window.setTimeout(this._asyncsort,1)};SortableTable.prototype.getCache=function(G,E){if(!this.tBody){return[]}var F=this.tBody.rows;var B=F.length;var A=new Array(B);var D;for(var C=0;C<B;C++){D=F[C];A[C]={value:this.getRowValue(D,G,E),element:D}}return A};SortableTable.prototype.destroyCache=function(C){var A=C.length;for(var B=0;B<A;B++){C[B].value=null;C[B].element=null;C[B]=null}};SortableTable.prototype.getRowValue=function(A,E,C){if(this._sortTypeInfo[E]&&this._sortTypeInfo[E].getRowValue){return this._sortTypeInfo[E].getRowValue(A,C)}var B;var D=A.cells[C];if(typeof D.innerText!="undefined"){B=D.innerText}else{B=SortableTable.getInnerText(D)}return this.getValueFromString(B,E)};SortableTable.getInnerText=function(E){var D="";var C=E.childNodes;var A=C.length;for(var B=0;B<A;B++){switch(C[B].nodeType){case 1:D+=SortableTable.getInnerText(C[B]);break;case 3:D+=C[B].nodeValue;break}}return D};SortableTable.prototype.getValueFromString=function(A,B){if(this._sortTypeInfo[B]){return this._sortTypeInfo[B].getValueFromString(A)}return A};SortableTable.prototype.getSortFunction=function(B,A){if(this._sortTypeInfo[B]){return this._sortTypeInfo[B].compare}return SortableTable.basicCompare};SortableTable.prototype.destroy=function(){this.uninitHeader();var A=this.document.parentWindow;if(A&&typeof A.detachEvent!="undefined"){A.detachEvent("onunload",this._onunload)}this._onunload=null;this.element=null;this.tHead=null;this.tBody=null;this.document=null;this._headerOnclick=null;this.sortTypes=null;this._asyncsort=null;this.onsort=null};SortableTable.prototype.addSortType=function(D,A,C,B){this._sortTypeInfo[D]={type:D,getValueFromString:A||SortableTable.idFunction,compare:C||SortableTable.basicCompare,getRowValue:B}};SortableTable.prototype.removeSortType=function(A){delete this._sortTypeInfo[A]};SortableTable.basicCompare=function compare(B,A){if(B.value<A.value){return -1}if(A.value<B.value){return 1}return 0};SortableTable.idFunction=function(A){return A};SortableTable.toUpperCase=function(A){return A.toUpperCase()};SortableTable.toDate=function(A){var B=A.split("-");var C=new Date(0);C.setFullYear(B[0]);C.setDate(B[2]);C.setMonth(B[1]-1);return C.valueOf()};SortableTable.prototype.addSortType("Number",Number);SortableTable.prototype.addSortType("CaseInsensitiveString",SortableTable.toUpperCase);SortableTable.prototype.addSortType("Date",SortableTable.toDate);SortableTable.prototype.addSortType("String");