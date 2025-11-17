<?php

use PHPUnit\Framework\TestCase;

// Inclusion des fichiers nécessaires
include_once __DIR__ . "/../../site/configBdd.php";
include_once __DIR__ . "/../../site/modeles/CompteClientDAO.php";


class CompteClientDAOTest extends TestCase
{

    /**
     * @var CompteClientDAO
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new CompteClientDAO;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void {}

    /**
     * @covers CompteClientDAO::getLesComptesDesClients
     */
    public function testGetLesComptesDesClients()
    {
        $cpte1 = new CompteClient(1, 'ADOR', 'Matt', 10000);
        $cpte2 = new CompteClient(2, 'PARD', 'Léo', 50);
        $cpte3 = new CompteClient(3, 'ATEUR', 'Nordine', 6000);
        $cpte4 = new CompteClient(4, 'PARD', 'Léo', 100);

        $listeAttendue = array($cpte1, $cpte2, $cpte3, $cpte4);

        $this->assertEquals(
            $listeAttendue,
            $this->object->getLesComptesDesClients()
        );
    }

    /**
     * @covers CompteClientDAO::virerDeVers_Ok
     */
    public function testVirerDeVers_Ok()
    {
        $this->assertEquals(
            2,
            $this->object->virerDeVers(1, 2, 20)
        );
    }

    /**
     * @covers CompteClientDAO::virerDeVers_NOkSource
     * @todo Modifier le résultat attendu si cette source d'erreur a été gérée
     */
    public function testVirerDeVers_NokSource()
    {
        $this->assertEquals(
            1,
            $this->object->virerDeVers(5, 2, 20)
        );
    }

    /**
     * @covers CompteClientDAO::virerDeVers_NOkDestination    
     * @todo Modifier le résultat attendu si cette source d'erreur a été gérée
     * 
     */
    public function testVirerDeVers_NokDestination()
    {
        $this->assertEquals(
            1,
            $this->object->virerDeVers(1, 5, 20)
        );
    }

    /**
     * @covers CompteClientDAO::virerDeVers_NOkLes2
     */
    public function testVirerDeVers_NokLes2()
    {
        $this->assertEquals(
            0,
            $this->object->virerDeVers(7, 5, 20)
        );
    }

    /**
     * @covers CompteClientDAO::virerDeVers_NOkMt
     * @todo Modifier le résultat attendu si cette source d'erreur a été gérée
     */
    public function testVirerDeVers_NokMt()
    {
        $this->expectException(TypeError::class);
        //TypeError: Unsupported operand types: int - string
        $this->object->virerDeVers(1, 2, "dix");
    }
}
