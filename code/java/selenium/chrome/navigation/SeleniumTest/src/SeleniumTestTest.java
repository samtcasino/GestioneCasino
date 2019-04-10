import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;
import java.io.File;
import org.junit.jupiter.api.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.phantomjs.PhantomJSDriver;

class SeleniumTestTest {
    String URL = "http://cashyland.tk/";
    WebDriver driver = new ChromeDriver();

    void home(){
        WebElement home = null;
        home = driver.findElement(By.linkText("Home"));
        home.click();
        wai();
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Home",driver.getTitle());
    }

    void accedi(){
        WebElement accedi = null;
        accedi = driver.findElement(By.linkText("Accedi"));
        accedi.click();
        wai();
        System.out.println(driver.getTitle());
        assertEquals("GestioneCasino - Login",driver.getTitle());
    }

    void registrati(){
        WebElement registrati = null;
        registrati = driver.findElement(By.name("register"));
        registrati.click();
        wai();
        System.out.println(driver.getTitle());
        assertEquals("GestioneCasino - Registrazione",driver.getTitle());
    }

    void forgot(){
        WebElement forgot = null;
        forgot = driver.findElement(By.linkText("Hai dimenticato la password?"));
        forgot.click();
        wai();
        System.out.println(driver.getTitle());
        assertEquals("GestioneCasino - Password Smarrita?",driver.getTitle());
    }

    void giochi(){
        WebElement giochi = null;
        giochi = driver.findElement(By.linkText("Giochi"));
        giochi.click();
        wai();
        System.out.println(driver.getTitle());
        assertEquals("Neuron Template - About",driver.getTitle());
    }

    void foto(){
        WebElement foto = null;
        foto = driver.findElement(By.linkText("Foto"));
        foto.click();
        wai();
        System.out.println(driver.getTitle());
        assertEquals("Neuron Template - Gallery",driver.getTitle());
    }

    void map(){
        WebElement map = null;
        
    }

    @Test
    void test() {
        File file = new File("C:\\Users\\Utente\\Desktop\\Tutto\\2018-19\\modulo 306\\Utility\\Progetto 3\\phantomjs-2.1.1-windows\\bin\\phantomjs.exe");
        //System.setProperty("phantomjs.binary.path", file.getAbsolutePath());
        System.setProperty("webdriver.chrome.driver","C:\\Program Files (x86)\\Google\\Chrome\\Application\\chromedriver.exe");


        //WebDriver driver = new ChromeDriver();







        driver.get(URL);
        wai();
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Home",driver.getTitle());

        accedi();
        registrati();


        accedi();
        forgot();


        accedi();

        home();
        giochi();

        foto();


        home();

        map = driver.findElement(By.linkText("Clicca qui per aprire la mappa"));
        map.click();
        wai();
        System.out.println(driver.getTitle());
        assertEquals("Mandalay Bay Resort and Casino - Google Maps",driver.getTitle());

        home();



        System.out.println("OK");

        driver.quit();
    }

    public void wai() {
        try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    }
}