<?php

    namespace CitasBundle\Command;

    use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
    use Symfony\Component\Console\Input\ArrayInput;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;
    use Symfony\Component\Console\Style\SymfonyStyle;

    class CitasInstallCommand extends ContainerAwareCommand {

        /**
         * configure
         */
        protected function configure() {

            $this
                ->setName('citas:install')
                ->setDescription('Instalacion de base de datos y datos demo')
            ;
        }

        /**
         * @param InputInterface $input
         * @param OutputInterface $output
         * @return int|null|void
         */
        protected function execute(InputInterface $input, OutputInterface $output) {

            $io = new SymfonyStyle($input, $output);
            $io->title('Instalación de Sistema DEMO de Citas');

            $arguments = array(
                'command' => 'doctrine:database:drop',
                '--if-exists' => true,
                '--force' => true
            );
            $this->getCommandData($input, $output, $arguments);

            $arguments = array(
                'command' => 'doctrine:database:create',
                '--if-not-exists' => true
            );
            $this->getCommandData($input, $output, $arguments);

            $arguments = array(
                'command' => 'doctrine:schema:create',
            );
            $this->getCommandData($input, $output, $arguments);

            $arguments = array(
                'command' => 'doctrine:fixtures:load',
                '--append' => true,
                '--purge-with-truncate' => true
            );
            $this->getCommandData($input, $output, $arguments);
        }

        private function getCommandData(InputInterface $input, OutputInterface $output, $array = []) {

            $command = $this->getApplication()->find($array['command']);
            $greetInput = new ArrayInput($array);
            return $command->run($greetInput, $output);
        }
    }
