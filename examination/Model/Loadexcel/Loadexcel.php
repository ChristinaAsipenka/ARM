// Класс, непосредственно читающий файл
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
 
// ...
// Создаём ридер 
$reader = new Xlsx();
// Если вы не знаете, какой будет формат файла, можно сделать ридер универсальным:
// $reader = IOFactory::createReaderForFile($file);
// $reader->setReadDataOnly(true);
 
// Если вы хотите установить строки и столбцы, которые необходимо читать, создайте класс ReadFilter
$reader->setReadFilter( new MyReadFilter(11, 1000, range('B', 'O')) );
 
// Читаем файл и записываем информацию в переменную
$spreadsheet = $reader->load($file);
 
// Так можно достать объект Cells, имеющий доступ к содержимому ячеек
$cells = $spreadsheet->getActiveSheet()->getCellCollection();
         
// Далее перебираем все заполненные строки (столбцы B - O)
for ($row = 10; $row <= $cells->getHighestRow(); $row++){
    for ($col = 'B'; $col <= 'O'; $col++) {
        // Так можно получить значение конкретной ячейки
        $cells->get($col.$row)->getValue();
 
        // а также здесь можно поместить ваш функциональный код
    }
}            
 
return true;