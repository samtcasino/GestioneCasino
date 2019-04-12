import org.junit.jupiter.api.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

import java.io.File;

import static org.junit.jupiter.api.Assertions.*;

class SeleniumRegistrationTestTest {
    private String URL = "http://cashyland.tk/";
    private WebDriver driver = null;

    void accedi(){
        WebElement accedi = null;
        accedi = driver.findElement(By.linkText("Accedi"));
        accedi.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("GestioneCasino - Login",driver.getTitle());
    }

    void registrati(){
        WebElement registrati = null;
        registrati = driver.findElement(By.name("register"));
        registrati.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("GestioneCasino - Registrazione",driver.getTitle());
    }

    void insertName(String name){
        WebElement nome = driver.findElement(By.id("firstname"));
        nome.sendKeys(name);
    }

    void insertCognome(String surname){
        WebElement cognome = driver.findElement(By.id("surname"));
        cognome.sendKeys(surname);
    }

    void insertDataNascita(String birthday){
        WebElement dataNascita = driver.findElement(By.id("birthday"));
        dataNascita.sendKeys(birthday);
    }

    @Test
    void test() {
        File file = new File("C:\\Users\\Utente\\Desktop\\Tutto\\2018-19\\modulo 306\\Utility\\Progetto 3\\phantomjs-2.1.1-windows\\bin\\phantomjs.exe");
        System.setProperty("webdriver.chrome.driver","C:\\Program Files (x86)\\Google\\Chrome\\Application\\chromedriver.exe");
        driver = new ChromeDriver();
        driver.get(URL);
        waitMillis(1000);
        System.out.println(driver.getTitle());

        assertEquals("CashyLand - Home",driver.getTitle());
        accedi();
        registrati();

        insertName("Matteo");
        insertCognome("Forni");
        insertDataNascita("12.12.2012");


        WebElement via = driver.findElement(By.id("address"));
        via.sendKeys("via da brut");

        WebElement noCivico = driver.findElement(By.id("houseNumber"));
        noCivico.sendKeys("45");

        WebElement cap = driver.findElement(By.id("zipCode"));
        cap.sendKeys("9832");

        WebElement citta = driver.findElement(By.id("city"));
        citta.sendKeys("Giornico");

        WebElement telefono = driver.findElement(By.id("phoneNumber"));
        telefono.sendKeys("0799998877");

        WebElement sesso = driver.findElement(By.id("email"));
        sesso.sendKeys("matteo.ghilavdini@samtvevano.ch");

        WebElement email = driver.findElement(By.id("password"));
        email.sendKeys("MatteoGhilaStorto1");

        WebElement pass = driver.findElement(By.id("repassword"));
        pass.sendKeys("MatteoGhilaStorto1");

        WebElement registrati = null;
        registrati = driver.findElement(By.name("register"));
        registrati.click();
        waitMillis(1000);
        assertEquals("GestioneCasino - Verifica Mail",driver.getTitle());

        System.out.println("OK");
    }

    public void waitMillis(int millis) {
        try {
            Thread.sleep(millis);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
}