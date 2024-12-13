<?php
namespace App\Command;

/*Declara el nombre del comando directamente en el atributo de la clase. 
Opcionalmente, puedes añadir una descripción breve y un texto de ayuda.
*/
use Symfony\Component\Console\Attribute\AsCommand;
//Proporciona los métodos y propiedades esenciales para crear comandos,
use Symfony\Component\Console\Command\Command;
//acilita la recogida de datos dinámicos durante la ejecución del comando.
use Symfony\Component\Console\Input\InputInterface;
//acilita la recogida de datos dinámicos durante la ejecución del comando.
use Symfony\Component\Console\Output\OutputInterface;

//
// #[AsCommand(
//     name: 'app:commadn-style',
//     description: 'Saca un HOLA MUNDO.',
//     hidden: false,
//     // aliases: ['app:add-user']
// )]


//nombre del comando 
#[AsCommand(name: 'app:command-style')]
class HolaMundoCommand extends Command{
    protected function execute(InputInterface $input, OutputInterface $output): int{
        echo "Hola Mundo";

        return Command::SUCCESS;
    }

    protected function configure(): void
    {
        $this
            // the command description shown when running "php bin/console list"
            ->setDescription('Saca Hola Mundo.')
            // the command help shown when running the command with the "--help" option
            ->setHelp('Este comando saca por pantalla un mensaje siendo este Hola Mundo  ')
        ;
    }


}


?>
