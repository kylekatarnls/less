<?php

namespace NodejsPhpFallback;

use Less_Parser;

class Less extends Wrapper
{
    protected $compress;

    public function __construct($file, $compress = false)
    {
        $this->compress = $compress;
        parent::__construct($file);
    }

    public function compile()
    {
        $file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'compilation.css';

        $this->execModuleScript(
            'less',
            'bin/lessc',
            ($this->compress ? '--clean-css ' : '') .
            escapeshellarg($this->getPath('source.less')) . ' ' .
            escapeshellarg($file)
        );
        $css = file_get_contents($file);
        unlink($file);

        return $css;
    }

    public function fallback()
    {
        $parser = new Less_Parser();
        $parser->parse($this->getSource());

        return $parser->getCss();
    }
}
