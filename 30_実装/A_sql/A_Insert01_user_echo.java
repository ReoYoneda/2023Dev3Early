package A_sql;
public class A_Insert01_user_echo {
    public static void main(String[] args) {
        String s = "INSERT INTO `users`(`user_loginid`, `user_password`, `user_name`, `user_course`, `user_major`, `user_grade`, `user_classname`, `user_Fsubject`) VALUES ";
        
        String[] ary = {"a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"};

        for(int i=0;i<26;i++){
            for(int j=0;j<26;j++){
                s += "('"+ary[i]+ary[j]+"','"+ary[i]+ary[j]+"','"+ary[i]+ary[j]+"','"+ary[i]+ary[j]+"','"+ary[i]+ary[j]+"',"+(j%4+1)+",'"+ary[i]+ary[j]+"','"+ary[i]+ary[j]+"'),";
            }
        }

        System.out.println(s.substring(0,s.length()-1));
    }
}
