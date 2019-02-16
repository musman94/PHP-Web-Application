import static com.mysql.fabric.ServerRole.PRIMARY;
import java.sql.*;
public class Con 
{
    @SuppressWarnings("empty-statement")
    public static void main(String args[])
	{
            String url="jdbc:mysql://dijkstra2.ug.bcc.bilkent.edu.tr/muhammad_usman" ; 
            Connection con = null;
            try
            {
                Class.forName("com.mysql.jdbc.Driver");  
            }catch(ClassNotFoundException e){System.out.println(e.getMessage());}
              try{
                con = DriverManager.getConnection(url,"muhammad.usman","el0639xo3");
                Statement stmt = con.createStatement();
                 //DROPPING
                stmt.executeUpdate("DROP TABLE IF EXISTS owns");
                stmt.executeUpdate("DROP TABLE IF EXISTS customer");
                stmt.executeUpdate("DROP TABLE IF EXISTS account");
                
                //CUSTOMER
                stmt.executeUpdate("CREATE TABLE customer " +
                   "(cid CHAR(12)," +
                    "name VARCHAR(50)," +
                    "bdate DATE," +
                    "address VARCHAR(50)," +
                    "city VARCHAR(20)," +
                    "nationality VARCHAR(20)," +     
                    " PRIMARY KEY (cid))ENGINE=innodb;");
                stmt.executeUpdate("INSERT INTO customer VALUES(200000001,'Cem','1980.10.10','Tunali','ankara','TC')");
                stmt.executeUpdate("INSERT INTO customer VALUES(200000002,'Asli','1985.09.08','nisantasi','istanbul','TC')");
                stmt.executeUpdate("INSERT INTO customer VALUES(200000003,'Ahmet','1995.02.11','Karsiyaka','izmir','TC')");
                
                //ACCOUNT
                stmt.executeUpdate("CREATE TABLE account " +
                   "(aid CHAR(8)," +
                    "branch VARCHAR(20)," +
                    "balance FLOAT," +
                    "openDate DATE," +    
                    "PRIMARY KEY (aid))ENGINE=innodb;");
                stmt.executeUpdate("INSERT INTO account VALUES('A0000001','kizilay','2000','2009.01.01')");
                stmt.executeUpdate("INSERT INTO account VALUES('A0000002','bilkent','8000','2011.01.01')");
                stmt.executeUpdate("INSERT INTO account VALUES('A0000003','cankaya','4000','2012.01.01')");
                stmt.executeUpdate("INSERT INTO account VALUES('A0000004','sincan','1000','2012.01.01')");
                stmt.executeUpdate("INSERT INTO account VALUES('A0000005','tandogan','3000','2013.01.01')");
                stmt.executeUpdate("INSERT INTO account VALUES('A0000006','eryaman','5000','2015.01.01')");
                stmt.executeUpdate("INSERT INTO account VALUES('A0000007','umitkoy','6000','2017.01.01')");
                
                stmt.execute("CREATE TABLE owns(cid CHAR(12), " +
                    "aid CHAR(8), PRIMARY KEY(aid, cid), " +
                    "FOREIGN KEY(cid) REFERENCES customer(cid) ON DELETE CASCADE, " +
                    "FOREIGN KEY(aid) REFERENCES account(aid) ON DELETE CASCADE)ENGINE=innodb;");
                stmt.execute("INSERT INTO owns VALUES(200000001,'A0000001')");
                stmt.execute("INSERT INTO owns VALUES(200000001,'A0000002')");
                stmt.execute("INSERT INTO owns VALUES(200000001,'A0000003')");
                stmt.execute("INSERT INTO owns VALUES(200000001,'A0000004')");
                stmt.execute("INSERT INTO owns VALUES(200000002,'A0000002')");
                stmt.execute("INSERT INTO owns VALUES(200000002,'A0000003')");
                stmt.execute("INSERT INTO owns VALUES(200000002,'A0000005')");
                stmt.execute("INSERT INTO owns VALUES(200000003,'A0000006')");
                stmt.execute("INSERT INTO owns VALUES(200000003,'A0000007')");
                    
                ResultSet rs = stmt.executeQuery("SELECT * FROM customer");
                for(int i = 0; i < 3; i++)
                {
                     while(rs.next())
                {
                con = DriverManager.getConnection(url,"muhammad.usman","el0639xo3");

                    String cid = rs.getString("cid"); 
                    String name = rs.getString("name");
                    java.sql.Date date = rs.getDate(3);
                    String address = rs.getString("address");
                    String city = rs.getString("city");
                    String nationality = rs.getString("nationality");
                    System.out.println(cid + ":" + name + ":" + date + ":" + address + ":" + city + ":" + nationality);
                }
                
                }
                
                rs = stmt.executeQuery("SELECT * FROM account");
                for(int i = 0; i < 7; i++)
                {
                     while(rs.next())
                {
                    String aid = rs.getString("aid"); 
                    String branch = rs.getString("branch");
                    float balance = rs.getFloat("balance");
                    java.sql.Date date = rs.getDate(4);
                    System.out.println(aid + ":" + branch + ":" + balance + ":" + date);
                }
                
                }
                
                rs = stmt.executeQuery("SELECT * FROM owns");
                for(int i = 0; i < 7; i++)
                {
                     while(rs.next())
                {
                    String cid = rs.getString("cid");
                    String aid = rs.getString("aid"); 
                    System.out.println(cid + ":" + aid);
                }
                
                }
                
                
              }catch (SQLException except){System.out.println(except.getMessage());};
        }
}