<?php

    namespace CitasBundle\DataFixtures\ORM;

    use CitasBundle\Entity\Eps;
    use CitasBundle\Entity\Especialidades;
    use CitasBundle\Entity\Medicos;
    use CitasBundle\Entity\Pacientes;
    use Doctrine\Common\DataFixtures\AbstractFixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Common\Persistence\ObjectManager;
    use Faker\Factory;

    class FakerFixture extends AbstractFixture implements OrderedFixtureInterface {

        /**
         * @param ObjectManager $manager
         */
        public function load(ObjectManager $manager) {

            $faker = Factory::create();
            $especialidad = $this->getEspecialidad($manager);
            $medicos = $this->getMedicos($manager, $faker, $especialidad);
            $eps = $this->getEPS($manager, $faker);
            $pacientes = $this->getPacientes($manager, $faker, $eps);
            $this->getConsultorios($manager);
        }

        /**
         * @param ObjectManager $manager
         */
        private function getConsultorios(ObjectManager $manager) {

            for ($i = 1; $i < 6; $i++) {

                for ($j = 1; $j < 6; $j++) {
                    $entity = new \CitasBundle\Entity\Consultorios();
                    $entity->setName(sprintf('%s0%s', $i, $j));
                    $manager->persist($entity);
                }
            }
            $manager->flush();
        }

        /**
         * @param ObjectManager $manager
         * @param null $faker
         * @param array $eps
         */
        private function getPacientes(ObjectManager $manager, $faker = null, $eps = []) {

            $index = 1030;

            for ($i = 0; $i < 30; $i++):
                $entity = new Pacientes();
                $entity->setName(mb_strtoupper($faker->firstName()));
                $entity->setLastName(mb_strtoupper($faker->lastName));
                $entity->setAddress(mb_strtoupper($faker->address));
                $entity->setDocument($index);
                $entity->setEps($eps[rand(0, 9)]);
                $manager->persist($entity);
                $index++;
            endfor;

            $manager->flush();
        }

        /**
         * @param ObjectManager $manager
         * @param $faker
         * @return array
         */
        private function getEPS(ObjectManager $manager, $faker) {

            $eps = [];

            for ($i = 0; $i < 10; $i++):
                $entity = new Eps();
                $entity->setName(mb_strtoupper($faker->domainWord));
                $manager->persist($entity);
                $eps[] = $entity;
            endfor;

            $manager->flush();
            return $eps;
        }

        /**
         * @param ObjectManager $manager
         * @param Factory $faker
         * @param array $especialidad
         * @return array
         */
        private function getMedicos(ObjectManager $manager, $faker, $especialidad = []) {

            $medico = [];

            for ($i = 0; $i < 10; $i++):
                $entity = new Medicos();
                $entity->setName(mb_strtoupper($faker->firstName()));
                $entity->setLastName(mb_strtoupper($faker->lastName));
                $entity->setSpecialty($especialidad[rand(0, 2)]);
                $manager->persist($entity);
                $medico[] = $entity;
            endfor;

            $manager->flush();
            return $medico;
        }

        /**
         * @param ObjectManager $manager
         * @return array
         */
        private function getEspecialidad(ObjectManager $manager) {

            $especialidad = [];

            $entity = new Especialidades();
            $entity->setName('MEDICINA GENERAL');
            $manager->persist($entity);
            $especialidad[] = $entity;

            $entity = new Especialidades();
            $entity->setName('NEUROLOGIA');
            $manager->persist($entity);
            $especialidad[] = $entity;

            $entity = new Especialidades();
            $entity->setName('ORTOPEDIA');
            $manager->persist($entity);
            $especialidad[] = $entity;

            $manager->flush();

            return $especialidad;
        }

        /**
         * @return int
         */
        public function getOrder() {
            return 1;
        }
    }
