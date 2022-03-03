<?php
namespace AdapterPattern;

interface Target{
    public function send($message);
}

function writeln($content) {
    echo $content."<br/>";
}

class Translate{
    public function receive($message) : void
    {
        writeln('Nhận thông tin Adapter... ' . $message);
    }
}

class Adapter implements Target{
    protected Translate $textTranslate;

    public function __construct(Translate $text){
        $this->textTranslate = $text;
    }

    // Translate from Vietnamese to English
    private function translate($message): string
    {
        return "Hello";
    }

    public function send($message){
        $ENMessage = $this->translate($message);
        $this->textTranslate->receive($ENMessage);
    }
}

// Initialization
class Client{
    public function send(){
        $target = new Adapter(new Translate);
        $target->send('Xin chào');
    }
}
writeln('Begin Adapter Pattern');

$client = new Client;
$client->send();

writeln('End Adapter Pattern');