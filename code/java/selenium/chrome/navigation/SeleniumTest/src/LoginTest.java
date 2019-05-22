import org.junit.jupiter.api.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

import java.io.File;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertNotEquals;

class LoginTest {
    private String URL = "http://cashyland.tk/";
    private WebDriver driver = null;

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
        final File firefoxPath = new File(System.getProperty("lmportal.deploy.firefox.path", "/usr/bin/firefox"));

        driver = new FirefoxDriver();
        WebDriverWait wait = new WebDriverWait(driver, 60);
        wait.until(ExpectedConditions.elementToBeClickable(By.className("container")));
        driver.get(URL);
        System.out.println(driver.getTitle());
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