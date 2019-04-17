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
    private WebElement nome;
    private WebElement cognome;
    private WebElement dataNascita;
    private WebElement via;
    private WebElement noCivico;
    private WebElement cap;
    private WebElement citta;
    private WebElement telefono;
    private WebElement indirizzoEmail;
    private WebElement pass;
    private WebElement repass;


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
        nome = driver.findElement(By.id("firstname"));
        nome.sendKeys(name);
    }

    void insertSurname(String surname){
        cognome = driver.findElement(By.id("surname"));
        cognome.sendKeys(surname);
    }

    void insertBirthday(String birthday){
        dataNascita = driver.findElement(By.id("birthday"));
        dataNascita.sendKeys(birthday);
    }

    void insertAddress(String address){
        via = driver.findElement(By.id("address"));
        via.sendKeys(address);
    }

    void insertHouseNumber(String houseNumber){
        noCivico = driver.findElement(By.id("houseNumber"));
        noCivico.sendKeys(houseNumber);
    }

    void insertZipCode(String zipCode){
        cap = driver.findElement(By.id("zipCode"));
        cap.sendKeys(zipCode);
    }

    void insertCity(String city){
        citta = driver.findElement(By.id("city"));
        citta.sendKeys(city);
    }

    void insertPhoneNumber(String phoneNumber){
        telefono = driver.findElement(By.id("phoneNumber"));
        telefono.sendKeys(phoneNumber);
    }

    void insertEmail(String email){
        indirizzoEmail = driver.findElement(By.id("email"));
        indirizzoEmail.sendKeys(email);
    }

    void insertPassword(String password){
        pass = driver.findElement(By.id("password"));
        pass.sendKeys(password);
    }

    void insertRePassword(String repassword){
        repass = driver.findElement(By.id("repassword"));
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

    void clearInputs(){
        nome.clear();
        cognome.clear();
        dataNascita.clear();
        via.clear();
        noCivico.clear();
        cap.clear();
        citta.clear();
        telefono.clear();
        indirizzoEmail.clear();
        pass.clear();
        repass.clear();
    }

    void testTextInputs(String text, String input){
        insertBirthday("12.12.2000");
        insertHouseNumber("982");
        insertZipCode("8999");
        insertPhoneNumber("0798887766");
        insertEmail(getEmail());
        insertPassword("iuciuvhsd98ds98HBHB989");
        insertRePassword("iuciuvhsd98ds98HBHB989");
        if(input.equalsIgnoreCase("name")){
            insertSurname("Test");
            insertCity("Lugano");
            insertAddress("via test di selenium");
            insertName(text);
        }else if(input.equalsIgnoreCase("surname")){
            insertName("Selenium");
            insertCity("Lugano");
            insertAddress("via test di selenium");
            insertSurname(text);
        }else if(input.equalsIgnoreCase("city")){
            insertSurname("Test");
            insertName("Selenium");
            insertAddress("via test di selenium");
            insertCity(text);
        }else if(input.equalsIgnoreCase("address")){
            insertSurname("Test");
            insertCity("Lugano");
            insertName("Selenium");
            insertAddress(text);
        }
        pressButton();
        clearInputs();
    }

    void testBirthday(String birthday){
        insertName("Selenium");
        insertSurname("Test");
        insertBirthday(birthday);
        insertAddress("via test di selenium");
        insertHouseNumber("982");
        insertZipCode("8999");
        insertCity("Lugano");
        insertPhoneNumber("0798887766");
        insertEmail(getEmail());
        insertPassword("iuciuvhsd98ds98HBHB989");
        insertRePassword("iuciuvhsd98ds98HBHB989");
        pressButton();
        clearInputs();
    }

    void testHouseNumber(String houseNumber){
        insertName("Selenium");
        insertSurname("Test");
        insertBirthday("12.12.2000");
        insertAddress("via test di selenium");
        insertHouseNumber(houseNumber);
        insertZipCode("8999");
        insertCity("Lugano");
        insertPhoneNumber("0798887766");
        insertEmail(getEmail());
        insertPassword("iuciuvhsd98ds98HBHB989");
        insertRePassword("iuciuvhsd98ds98HBHB989");
        pressButton();
        clearInputs();
    }

    void testZipCode(String zipCode){
        insertName("Selenium");
        insertSurname("Test");
        insertBirthday("12.12.2000");
        insertAddress("via test di selenium");
        insertHouseNumber("10");
        insertZipCode(zipCode);
        insertCity("Lugano");
        insertPhoneNumber("0798887766");
        insertEmail(getEmail());
        insertPassword("iuciuvhsd98ds98HBHB989");
        insertRePassword("iuciuvhsd98ds98HBHB989");
        pressButton();
        clearInputs();
    }

    void testEmail(String email){
        insertName("Selenium");
        insertSurname("Test");
        insertBirthday("12.12.2000");
        insertAddress("via test di selenium");
        insertHouseNumber("10");
        insertZipCode("9876");
        insertCity("Lugano");
        insertPhoneNumber("0798887766");
        insertEmail(email);
        insertPassword("iuciuvhsd98ds98HBHB989");
        insertRePassword("iuciuvhsd98ds98HBHB989");
        pressButton();
        clearInputs();
    }

    void testPhoneNumber(String phoneNumber){
        insertName("Selenium");
        insertSurname("Test");
        insertBirthday("12.12.2000");
        insertAddress("via test di selenium");
        insertHouseNumber("10");
        insertZipCode("9876");
        insertCity("Lugano");
        insertPhoneNumber(phoneNumber);
        insertEmail(getEmail());
        insertPassword("iuciuvhsd98ds98HBHB989");
        insertRePassword("iuciuvhsd98ds98HBHB989");
        pressButton();
        clearInputs();
    }

    void testPassword(String password){
        insertName("Selenium");
        insertSurname("Test");
        insertBirthday("12.12.2000");
        insertAddress("via test di selenium");
        insertHouseNumber("10");
        insertZipCode("9876");
        insertCity("Lugano");
        insertPhoneNumber("0798887766");
        insertEmail(getEmail());
        insertPassword(password);
        insertRePassword(password);
        pressButton();
        clearInputs();
    }

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
        assertEquals("CashyLand - Registrazione",driver.getTitle());

        /*Test name*/
        testTextInputs("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "name");
        testTextInputs("21","name");
        testTextInputs("S£l£nium~","name");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("NAME OK");

        /*Test surname*/
        testTextInputs("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "surname");
        testTextInputs("21","surname");
        testTextInputs("S£l£nium~","surname");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("SURNAME OK");

        /*Test birthday*/
        testBirthday("31.02.2010");
        testBirthday("12.12.5000");
        testBirthday("12.31.2000");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("BIRTHDAY OK");

        /*Test address*/
        testTextInputs("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "address");
        testTextInputs("21","address");
        testTextInputs("S£l£nium~","address");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("ADDRESS OK");

        /*Test HouseNumber*/
        testHouseNumber("jasnd");
        testHouseNumber("7834548547583475419753947147171717147247");
        testHouseNumber("8!$");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("HOUSENUMBER OK");

        /*Test ZipCode*/
        testZipCode("jasnd");
        testZipCode("7834548547583475419753947147171717147247");
        testZipCode("8!$");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("ZIPCODE OK");

        /*Test city*/
        testTextInputs("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "city");
        testTextInputs("21","city");
        testTextInputs("S£l£nium~","city");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("CITY OK");

        /*Test PhoneNumber*/
        testPhoneNumber("9238-12+12");
        testPhoneNumber("7834548547583475419753947147171717147247");
        testPhoneNumber("qwdxsas");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("PHONENUMBER OK");

        /*Test Email*/
        testEmail("email.com");
        testEmail("email@");
        testEmail("email@email");
        testEmail("9283§912");
        testEmail("ema$¨à¨!!il@email.09");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("EMAIL OK");

        /*Test Password*/
        testPhoneNumber("aaaaaaaa");
        testPhoneNumber("AAaaaaaa");
        testPhoneNumber("aaaaaaa12");
        testPhoneNumber("1938u21");
        testPhoneNumber("aaa!!~aaaa12");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("PASSWORD OK");


        /*These test should work*/
        insertName("Matteo");
        insertSurname("Forni");
        insertBirthday("12.12.2000");
        insertAddress("via test di selenium");
        insertHouseNumber("982");
        insertZipCode("8999");
        insertCity("Lugano");
        insertPhoneNumber("0798887766");
        assertEquals("CashyLand - Verifica Mail",driver.getTitle());
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