import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;
import java.io.File;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

class SeleniumTestTest {
    String URL = "http://cashyland.tk/";
    WebDriver driver = null;

    void home(){
        WebElement home = null;
        home = driver.findElement(By.linkText("Home"));
        home.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Home",driver.getTitle());
    }

    void accedi(){
        WebElement accedi = null;
        accedi = driver.findElement(By.linkText("Accedi"));
        accedi.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Login",driver.getTitle());
    }

    void registrati(){
        WebElement registrati = null;
        registrati = driver.findElement(By.name("register"));
        registrati.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Registrazione",driver.getTitle());
    }

    void forgot(){
        WebElement forgot = null;
        forgot = driver.findElement(By.linkText("Hai dimenticato la password?"));
        forgot.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Password Smarrita?",driver.getTitle());
    }

    void giochi(){
        WebElement giochi = null;
        giochi = driver.findElement(By.linkText("Giochi"));
        giochi.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Giochi",driver.getTitle());
    }

    void sale(){
        WebElement sale = null;
        sale = driver.findElement(By.linkText("Sale"));
        sale.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Sale",driver.getTitle());
    }

    void map(){
        WebElement map = null;
        map = driver.findElement(By.linkText("Clicca qui per aprire la mappa"));
        map.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("Mandalay Bay Resort and Casino - Google Maps",driver.getTitle());
    }

    @Test
    void test() {
        System.setProperty("webdriver.chrome.driver","/usr/bin/chromedriver");
        driver = new ChromeDriver();
        driver.get(URL);
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Home",driver.getTitle());

        accedi();
        registrati();
        accedi();
        forgot();
        accedi();
        home();
        giochi();
        home();
        sale();
        home();

        WebElement giochi = null;
        giochi = driver.findElement(By.linkText("Clicca qui per scoprirne di pìù"));
        giochi.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Giochi",driver.getTitle());

        home();
        map();
        System.out.println("OK");

        driver.quit();
    }

    public void waitMillis(int millis) {
        try {
            Thread.sleep(millis);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
}