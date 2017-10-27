<?php

    namespace CitasBundle\Services;


    use Symfony\Component\Filesystem\Filesystem;

    class LogService {

        /**
         * @var Filesystem
         */
        private $filesystem;

        /**
         * @var string
         */
        private $file;

        /**
         * LogService constructor.
         * @param Filesystem $filesystem
         */
        function __construct(Filesystem $filesystem) {
            $this->filesystem = $filesystem;
            $this->file = dirname(__DIR__).'/Log/queries.log';
        }

        /**
         * @param null $query
         */
        public function setLog($query = null) {

            if($this->filesystem->exists($this->file) == false) {
                $this->filesystem->touch($this->file);
            }

            $this->filesystem->appendToFile($this->file, sprintf("%s\n", $query));
        }
    }