<?php
require('fpdf/fpdf.php');
$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[3];
class PDF extends FPDF
{
protected $col = 0; // Current column
protected $y0;      // Ordinate of column start

function Header()
{
    // Page header
    global $title;

    $this->SetFont('Arial','B',15);
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,0);
    $this->SetTextColor(220,50,50);
    $this->SetLineWidth(1);
    $this->Cell($w,9,$title,1,1,'C',true);
    $this->Ln(10);
    // Save ordinate
    $this->y0 = $this->GetY();
}

function Footer()
{
    // Page footer
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(128);
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function SetCol($col)
{
    // Set position at a given column
    $this->col = $col;
    $x = 10+$col*65;
    $this->SetLeftMargin($x);
    $this->SetX($x);
}

function AcceptPageBreak()
{
    // Method accepting or not automatic page break
    if($this->col<2)
    {
        // Go to next column
        $this->SetCol($this->col+1);
        // Set ordinate to top
        $this->SetY($this->y0);
        // Keep on page
        return false;
    }
    else
    {
        // Go back to first column
        $this->SetCol(0);
        // Page break
        return true;
    }
}

function ChapterTitle($num, $label)
{
    // Title
    $this->SetFont('Arial','',12);
    $this->SetFillColor(200,220,255);
    $this->Cell(0,6,"Chapter $num : $label",0,1,'L',true);
    $this->Ln(4);
    // Save ordinate
    $this->y0 = $this->GetY();
}

function ChapterBody($file)
{
    // Read text file
    $txt = file_get_contents($file);
    // Font
    $this->SetFont('Times','',12);
    // Output text in a 6 cm width column
    $this->MultiCell(100,10,'Across the other side of the world, the merchant and his ship had arrived at their destination.  The people were so pleased to see them and were so welcoming that the merchant decided to send some presents to their king and queen.  The king and queen were so delighted that they invited them all to a feast.  But, believe it or not, as soon as the food was brought in hundreds of rats appeared as if by magic and gobbled it all up before they had a chance to eat.

“Oh dear” said the king “this is always happening – I never get a chance to eat my apple pie.  What can I do?”

“I have an idea” said the merchant “I have a very special cat which has travelled with me all the way from London, and she will gobble up your rats faster than they gobbled up your feast.”

Sure enough, to the king and queen’s joy, the next time a feast was prepared and the rats appeared, the cat pounced and killed all the rats as quick as lightening.

The king and queen danced for joy and gave the merchant a ship full of gold in return for the very special cat.

When the ship returned to London Dick was overwhelmed with the amount of gold the merchant gave him for his cat.  Over the years he used his money so wisely, and did so much good for all the people around him and who worked for him, that he was elected Lord Mayor of the City of London three times.  But he never forgot his kind friend the merchant, who had been so honest in giving him all the money that the cat had earned and kept nothing for himself. When Dick grew up he fell in love with Alice, the merchant’s beautiful daughter, and married her.  They lived happily ever after as people do in stories. Across the other side of the world, the merchant and his ship had arrived at their destination.  The people were so pleased to see them and were so welcoming that the merchant decided to send some presents to their king and queen.  The king and queen were so delighted that they invited them all to a feast.  But, believe it or not, as soon as the food was brought in hundreds of rats appeared as if by magic and gobbled it all up before they had a chance to eat.

“Oh dear” said the king “this is always happening – I never get a chance to eat my apple pie.  What can I do?”

“I have an idea” said the merchant “I have a very special cat which has travelled with me all the way from London, and she will gobble up your rats faster than they gobbled up your feast.”

Sure enough, to the king and queen’s joy, the next time a feast was prepared and the rats appeared, the cat pounced and killed all the rats as quick as lightening.

The king and queen danced for joy and gave the merchant a ship full of gold in return for the very special cat.

When the ship returned to London Dick was overwhelmed with the amount of gold the merchant gave him for his cat.  Over the years he used his money so wisely, and did so much good for all the people around him and who worked for him, that he was elected Lord Mayor of the City of London three times.  But he never forgot his kind friend the merchant, who had been so honest in giving him all the money that the cat had earned and kept nothing for himself. When Dick grew up he fell in love with Alice, the merchant’s beautiful daughter, and married her.  They lived happily ever after as people do in stories. Across the other side of the world, the merchant and his ship had arrived at their destination.  The people were so pleased to see them and were so welcoming that the merchant decided to send some presents to their king and queen.  The king and queen were so delighted that they invited them all to a feast.  But, believe it or not, as soon as the food was brought in hundreds of rats appeared as if by magic and gobbled it all up before they had a chance to eat.

“Oh dear” said the king “this is always happening – I never get a chance to eat my apple pie.  What can I do?”

“I have an idea” said the merchant “I have a very special cat which has travelled with me all the way from London, and she will gobble up your rats faster than they gobbled up your feast.”

Sure enough, to the king and queen’s joy, the next time a feast was prepared and the rats appeared, the cat pounced and killed all the rats as quick as lightening.

The king and queen danced for joy and gave the merchant a ship full of gold in return for the very special cat.

When the ship returned to London Dick was overwhelmed with the amount of gold the merchant gave him for his cat.  Over the years he used his money so wisely, and did so much good for all the people around him and who worked for him, that he was elected Lord Mayor of the City of London three times.  But he never forgot his kind friend the merchant, who had been so honest in giving him all the money that the cat had earned and kept nothing for himself. When Dick grew up he fell in love with Alice, the merchant’s beautiful daughter, and married her.  They lived happily ever after as people do in stories.');
    $this->Ln();
    // Mention
    $this->SetFont('','I');
    // $this->Cell(0,5,'(end of excerpt)');
    // Go back to first column
    $this->SetCol(0);
}

function PrintChapter($num, $title, $file)
{
    // Add chapter
    $this->AddPage();
    $this->ChapterTitle($num,$title);
    $this->ChapterBody($file);
}
}

$pdf = new PDF();
$title = '20000 Leagues Under the Seas';
$pdf->SetTitle($title);
$pdf->SetAuthor('Jules Verne');
$pdf->PrintChapter(1,'A RUNAWAY REEF','http://localhost/js/10.txt');
$pdf->PrintChapter(2,'THE PROS AND CONS','http://localhost/js/20.txt');
$pdf->Output();