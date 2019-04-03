import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

class SeleniumTestTest {

    @Test
    void testTitle(String expected, String title) {

        assertEquals(expected, title);

    }
}