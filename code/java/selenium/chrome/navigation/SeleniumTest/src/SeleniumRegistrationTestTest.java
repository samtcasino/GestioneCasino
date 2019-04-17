import org.junit.jupiter.api.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import java.util.Date;
import java.text.*;
import java.io.File;
import static org.junit.jupiter.api.Assertions.*;

class SeleniumRegistrationTestTest {
    private String URL = "http://cashyland.tk/";
    private WebDriver driver = null;
    private String email = "seleniumtest";
    private String endEmail = "@gmail.com";

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

    void insertSurname(String surname){
        WebElement cognome = driver.findElement(By.id("surname"));
        cognome.sendKeys(surname);
    }

    void insertBirthday(String birthday){
        WebElement dataNascita = driver.findElement(By.id("birthday"));
        dataNascita.sendKeys(birthday);
    }

    void insertAddress(String address){
        WebElement via = driver.findElement(By.id("address"));
        via.sendKeys(address);
    }

    void insertHouseNumber(String houseNumber){
        WebElement noCivico = driver.findElement(By.id("houseNumber"));
        noCivico.sendKeys(houseNumber);
    }

    void insertZipCode(String zipCode){
        WebElement cap = driver.findElement(By.id("zipCode"));
        cap.sendKeys(zipCode);
    }

    void insertCity(String city){
        WebElement citta = driver.findElement(By.id("city"));
        citta.sendKeys(city);
    }

    void insertPhoneNumber(String phoneNumber){
        WebElement telefono = driver.findElement(By.id("phoneNumber"));
        telefono.sendKeys(phoneNumber);
    }

    void insertEmail(String email){
        WebElement indirizzoEmail = driver.findElement(By.id("email"));
        indirizzoEmail.sendKeys(email);
    }

    void insertPassword(String password){
        WebElement pass = driver.findElement(By.id("password"));
        pass.sendKeys(password);
    }

    void insertRePassword(String repassword){
        WebElement repass = driver.findElement(By.id("repassword"));
        repass.sendKeys(repassword);
    }

    void pressButton(){
        WebElement registrati = null;
        registrati = driver.findElement(By.name("register"));
        registrati.click();
        waitMillis(1000);
    }

    String getEmail(){
        DateFormat dateFormat = new SimpleDateFormat("dd-MM-yyyy-HH-mm-ss");
        Date date = new Date();
        return email + dateFormat.format(date) + endEmail;
    }

    void testName(String name){
        insertName(name);
        insertSurname("Test");
        insertBirthday("12.12.2000");
        insertAddress("via test di selenium");
        insertHouseNumber("982");
        insertZipCode("8999");
        insertCity("Lugano");
        insertPhoneNumber("0798887766");
    }

    void testSurname(String surname){
        insertName("Selenium");
        insertSurname(surname);
        insertBirthday("12.12.2000");
        insertAddress("via test di selenium");
        insertHouseNumber("982");
        insertZipCode("8999");
        insertCity("Lugano");
        insertPhoneNumber("0798887766");
    }

    void testBirthday("String birthday")

    @Test
    void test() {
        File file = new File("C:\\Users\\Utente\\Desktop\\Tutto\\2018-19\\modulo 306\\Utility\\Progetto 3\\phantomjs-2.1.1-windows\\bin\\phantomjs.exe");
        System.setProperty("webdriver.chrome.driver","C:\\Program Files (x86)\\Google\\Chrome\\Application\\chromedriver.exe");
        driver = new ChromeDriver();
        driver.get(URL);
        waitMillis(1000);

        assertEquals("CashyLand - Home",driver.getTitle());
        accedi();
        registrati();

        /*These tests should fail*/
        /*Test with empty inputs*/
        pressButton();
        assertEquals("GestioneCasino - Registrazione",driver.getTitle());

        /*Test name*/
        testName("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
        pressButton();
        testName("21");
        pressButton();
        testName("S£l£nium~");

        /*Test surname*/
        testSurname("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
        pressButton();
        testSurname("21");
        pressButton();
        testSurname("T£$t~");


        /*These test should work*/
        insertName("Matteo");
        insertSurname("Forni");
        insertBirthday("12.12.2000");
        insertAddress("via test di selenium");
        insertHouseNumber("982");
        insertZipCode("8999");
        insertCity("Lugano");
        insertPhoneNumber("0798887766");



        insertPassword("iuciuvhsd98ds98HBHB989");
        insertRePassword("iuciuvhsd98ds98HBHB989");


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