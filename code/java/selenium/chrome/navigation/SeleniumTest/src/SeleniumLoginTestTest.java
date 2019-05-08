import org.junit.jupiter.api.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;


import static org.junit.jupiter.api.Assertions.*;

class SeleniumLoginTestTest {
    private String URL = "http://cashyland.tk/";
    private WebDriver driver = null;

    void accedi(){
        WebElement accedi = null;
        accedi = driver.findElement(By.linkText("Accedi"));
        accedi.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Login",driver.getTitle());
    }

    void insertEmail(String email){
        WebElement indirizzoEmail = driver.findElement(By.id("email"));
        indirizzoEmail.sendKeys(email);
    }

    void insertPassword(String password){
        WebElement pass = driver.findElement(By.id("password"));
        pass.sendKeys(password);
    }

    void pressButton(){
        WebElement registrati = null;
        registrati = driver.findElement(By.id("submit"));
        registrati.click();
        waitMillis(1000);
    }

    @Test
    void test() {
        System.setProperty("webdriver.chrome.driver","/usr/bin/chromedriver");
        ChromeOptions options = new ChromeOptions();
        options.addArguments("--headless", "--disable-gpu", "--window-size=1920,1200","--ignore-certificate-errors");
        driver = new ChromeDriver(options);        driver.get(URL);
        waitMillis(1000);

        assertEquals("CashyLand - Home",driver.getTitle());
        accedi();
        insertEmail("admin");
        insertPassword("Password&1");
        pressButton();
        assertEquals("CashyLand - MyAccount",driver.getTitle());

        assertNotEquals(driver.findElement(By.id("admin")), null);
        assertEquals("admin section",driver.findElement(By.id("admin")).getAttribute("title"));
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