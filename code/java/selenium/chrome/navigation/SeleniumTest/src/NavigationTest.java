
import org.junit.jupiter.api.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;
import java.io.File;
import static org.junit.jupiter.api.Assertions.assertEquals;

class NavigationTest {
    String URL = "http://cashyland.tk/";
    WebDriver driver = null;

    @Test
    void home() {
        WebElement home = null;
        home = driver.findElement(By.linkText("Home"));
        waitMillis(1000);
        home.click();
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Home", driver.getTitle());
    }

    @Test
    void accedi() {
        WebElement accedi = null;
        accedi = driver.findElement(By.id("loginLi"));
        WebElement loginLink = accedi.findElement(By.id("loginBtn"));
        waitMillis(1000);
        loginLink.click();
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Login", driver.getTitle());
    }

    @Test
    void registrati() {
        WebElement registrati = null;
        registrati = driver.findElement(By.name("register"));
        waitMillis(1000);
        registrati.click();
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Registrazione", driver.getTitle());
    }

    @Test
    void forgot() {
        WebElement forgot = null;
        forgot = driver.findElement(By.linkText("Hai dimenticato la password?"));
        waitMillis(1000);
        forgot.click();
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Password Smarrita?", driver.getTitle());
    }

    @Test
    void giochi() {
        WebElement giochi = null;
        giochi = driver.findElement(By.linkText("Giochi"));
        waitMillis(1000);
        giochi.click();
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Giochi", driver.getTitle());
    }

    @Test
    void sale() {
        WebElement sale = null;
        sale = driver.findElement(By.linkText("Sale"));
        waitMillis(1000);
        sale.click();
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Sale", driver.getTitle());
    }

    @Test
    void test() {
        final File firefoxPath = new File(System.getProperty("lmportal.deploy.firefox.path", "/usr/bin/firefox"));

        driver = new FirefoxDriver();
        WebDriverWait wait = new WebDriverWait(driver, 60);
        wait.until(ExpectedConditions.elementToBeClickable(By.className("container")));
        driver.get(URL);
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Home", driver.getTitle());

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