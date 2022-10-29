//функция генерации случайных чисел
//function объявляет функцию
//random_number название функции
//min и max аргументы функции
function random_number(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

//function объявляет функцидю (она объявлена, но не работает)
//ui_layout_view_show название функции
//name в скобкаах - парметрн функции, в кторой мы передаем значение при вызове
function ui_layout_view_show(name){
 // jQuery вызывает библиотеку jQuery  и выбирает элемент в скобках по селектору
// name подставляет значение параметра функции
 jQuery('[data-ui-layout-element="view"][data-ui-layout-element-name="'+ name +'"]')
 //   addClass метод библиотеки jQuery добавляет класс выбранному элементу
 // в апострофах указано строковое (тип данных, текст ) значение active
    .addClass('active');
    
     }

// functionобъявляет функцию она (объявлена но не работает)
// ui_layout_view_hide название функции
// name в скобках - параметр функции в которой мы передаем значение при вызове
 function ui_layout_view_hide(name){
// jQuery вызывает библиотеку jQuery и выбирает элемент в скобках по селектору
     // name подставляет значение параметра функции
    jQuery('[data-ui-layout-element="view"][data-ui-layout-element-name="' + name +'"]')
   //removeClass метод библиотеки jQuery снимает класс с выбранного элемента если такой класс назначен
    // в апостфах указано строковое тип данных, текст значение
    .removeClass('active');
 }