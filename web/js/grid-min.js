function reorderGridSN(F){table=document.getElementById(F);if(table){rows=table.getElementsByTagName("tr");totalRows=rows.length;var A=rows[0];var D=-1;var C=A.getElementsByTagName("TD");for(var B=0;B<C.length;B++){if(C[B].innerHTML=="SN"){D=B}}for(var E=1;E<totalRows;E++){rows[E].className=E%2==0?"dataGridRowEven":"dataGridRowOdd";C=rows[E].getElementsByTagName("TD");for(var B=0;B<C.length;B++){if(B==D){C[B].innerHTML=E}}}}}function checkGridSelection(){var A=document.forms.FORMgrid;if(!A){alert("Form object not found.");return false}return checkGridSelectionEngine(A,"FORMselectID[]")}function checkGridSelection2(A){var B=document.forms[A];if(!B){alert("Form object not found.");return false}return checkGridSelectionEngine(B,"FORMselectID[]")}function checkGridSelectionEngine(A,D){var F=A;var E=F.length;var C=0;for(var B=0;B<E;B++){if(F[B].name==D){if(F[B].checked){C++}}}if(C<1){alert("Please indicate your selection.");return false}else{return true}}function toggleAllGridRows(G,F,H){var A=document.forms[G];if(!A){alert("Form object not found.");return false}var D=0;var B=0;var I=document.getElementsByTagName("tr");if(I.length>0){for(var E=0;E<I.length;E++){if(I[E].id.indexOf(F)>-1){if(I[E].className.indexOf(" clicked")>-1){D++}else{B++}}}}var C=true;if(D>0&&B==0){C=false}else{if(B>0&&D==0){C=true}else{C=true}}selectAllGridSelectionEngineByVars(G,F,H,C);return true}function selectAllSelection(C,G,A){var F=document.forms[C];if(!F){alert("Form object not found.");return false}var E=F.length;var D=G;for(var B=0;B<E;B++){if(F[B].name==D){F[B].checked=A}}return true}function selectAllGridSelectionEngineByVars(I,J,F,H){var B=document.forms[I];if(!B){alert("Form object not found.");return false}var A;var G;var C;var E;var K=document.getElementsByTagName("tr");if(K.length>0){for(var D=0;D<K.length;D++){if(K[D].id.indexOf(J)>-1){A=K[D].id.substring(J.length,K[D].id.length);G=J+A;C=F+A;E=document.getElementById(C);if(E){if(H&&!E.checked){rowClicked(G,C)}else{if(!H&&E.checked){rowClicked(G,C)}}}else{}}}}return false}function selectAllGridSelectionEngine(J,D,I){var B=document.forms[J];if(!B){alert("Form object not found.");return false}var K="gridRow_";var G="gridCheckBox_";var A;var H;var C;var F;var L=document.getElementsByTagName("tr");if(L.length>0){for(var E=0;E<L.length;E++){if(L[E].id.indexOf(K)>-1){A=L[E].id.substring(K.length,L[E].id.length);H=K+A;C=G+A;F=document.getElementById(C);if(F){if(I&&!F.checked){rowClicked(H,C)}else{if(!I&&F.checked){rowClicked(H,C)}}}else{alert(C+" not found.")}}}}return false}function selectAllGridSelection(A){return selectAllGridSelectionEngine("FORMgrid","FORMselectID[]",A)}function rowHovered(A){var B=document.getElementById(A);if(B){hover(B)}}function rowUnhovered(A){var B=document.getElementById(A);if(B){unhover(B)}}function rowSelected(C,A){var D=document.getElementById(C);var B=document.getElementById(A);if(D){if(D.className.indexOf(" clicked")>-1){if(B){B.checked=true}}else{if(D.className.indexOf(" unclicked")>-1){D.className=D.className.replace(/unclicked/,"clicked");if(B){B.checked=true}}else{D.className+=" clicked";if(B){B.checked=true}}}}}function rowClicked(C,A){var D=document.getElementById(C);var B=document.getElementById(A);if(D){if(D.className.indexOf(" clicked")>-1){D.className=D.className.replace(/clicked/,"unclicked");if(B){B.checked=false}}else{if(D.className.indexOf(" unclicked")>-1){D.className=D.className.replace(/unclicked/,"clicked");if(B){B.checked=true}}else{D.className+=" clicked";if(B){B.checked=true}}}}if(!B){}}function hover(A){if(A){if(A.className.indexOf(" unhover")>-1){A.className=A.className.replace(/unhover/,"hover")}else{A.className+=" hover"}}}function unhover(A){if(A){if(A.className.indexOf(" hover")>-1){A.className=A.className.replace(/hover/,"unhover")}else{A.className+=" unhover"}}};