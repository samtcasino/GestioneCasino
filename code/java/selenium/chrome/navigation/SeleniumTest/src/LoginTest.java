import org.junit.jupiter.api.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
<<<<<<< HEAD:code/java/selenium/chrome/navigation/SeleniumTest/src/SeleniumLoginTestTest.java
import org.openqa.selenium.chrome.ChromeOptions;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;
=======
>>>>>>> 13105cd9d9323542d872e498e5cb8535dc24b4ed:code/java/selenium/chrome/navigation/SeleniumTest/src/LoginTest.java

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertNotEquals;

class LoginTest {
    private String URL = "http://cashyland.tk/";
    private WebDriver driver = null;

    @Test
    void accedi() {
        WebElement accedi = null;
        accedi = driver.findElement(By.linkText("Accedi"));
        accedi.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Login", driver.getTitle());
    }

    void insertEmail(String email) {
        WebElement indirizzoEmail = driver.findElement(By.id("email"));
        indirizzoEmail.sendKeys(email);
    }

    void insertPassword(String password) {
        WebElement pass = driver.findElement(By.id("password"));
        pass.sendKeys(password);
    }

    void pressButton() {
        WebElement registrati = null;
        registrati = driver.findElement(By.id("submit"));
        registrati.click();
        waitMillis(1000);
    }

    void pressUsersManagement() {
        WebElement button = null;
        button = driver.findElement(By.id("modifyUser"));
        button.click();
        waitMillis(1000);
    }

    void pressRoomsManagement() {
        WebElement button = null;
        button = driver.findElement(By.id("modifyRoom"));
        button.click();
        waitMillis(1000);
    }

    void pressGamesManagement() {
        WebElement button = null;
        button = driver.findElement(By.id("modifyGame"));
        button.click();
        waitMillis(1000);
    }

    void pressPromotionsManagement() {
        WebElement button = null;
        button = driver.findElement(By.id("modifyPromotion"));
        button.click();
        waitMillis(1000);
    }

    void pressImagesManagement() {
        WebElement button = null;
        button = driver.findElement(By.id("modifyMedia"));
        button.click();
        waitMillis(1000);
    }

    @Test
    void test() {
        System.setProperty("webdriver.chrome.driver", "/usr/bin/chromedriver");
        /*ChromeOptions options = new ChromeOptions();
        options.addArguments("--headless");
        options.addArguments("--no-sandbox");
        options.addArguments("--remote-debugging-port=9222");
        driver = new ChromeDriver(options);*/
        driver = new ChromeDriver();
        driver.get(URL);

        WebDriverWait wait = new WebDriverWait(driver, 20);
        wait.until(ExpectedConditions.elementToBeClickable(By.linkText("Accedi")));
        waitMillis(1000);

        assertEquals("CashyLand - Home", driver.getTitle());
        accedi();
        insertEmail("admin");
        insertPassword("Password&1");
        pressButton();
        assertEquals("CashyLand - MyAccount", driver.getTitle());

        assertNotEquals(driver.findElement(By.id("admin")), null);
        assertEquals("admin section", driver.findElement(By.id("admin")).getAttribute("title"));
        System.out.println("OK");

        pressUsersManagement();
        assertEquals("http://cashyland.tk/addThings.php?type=user", driver.getCurrentUrl());
        driver.navigate().back();
        waitMillis(1000);

        pressRoomsManagement();
        assertEquals("http://cashyland.tk/addThings.php?type=room", driver.getCurrentUrl());
        driver.navigate().back();
        waitMillis(1000);

        pressGamesManagement();
        assertEquals("http://cashyland.tk/addThings.php?type=game", driver.getCurrentUrl());
        driver.navigate().back();
        waitMillis(1000);

        pressPromotionsManagement();
        assertEquals("http://cashyland.tk/addThings.php?type=promotion", driver.getCurrentUrl());
        driver.navigate().back();
        waitMillis(1000);

        pressImagesManagement();
        assertEquals("http://cashyland.tk/uploadImage.php", driver.getCurrentUrl());
    }

    public void waitMillis(int millis) {
        try {
            Thread.sleep(millis);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
}