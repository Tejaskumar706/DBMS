#include <iostream>
#include <fstream>
using namespace std;

static int totrec=0;

int main()
{
    int choice;
    while(1)
    {
        cout<<"\nChoose your choice :: \n";
        cout<<"1) Add New Record\n";
        cout<<"2) Append New records\n";
        cout<<"3) Display records\n";
        cout<<"4) Exit\n";
        cout<<"\nEnter your choice :: ";
        cin>>choice;

        switch (choice)
        {
          case 1 :
                {
                     ofstream outfile;
                     outfile.open("C:\\Users\\ranja\\Documents\\file4.txt",ios::out);
                     cout<<"\n\nPlease Enter Details :: \n";
                     cout<<"\nEnter Roll No. :: ";
                     int roll;
                     cin>>roll;
                     outfile<<roll<<endl;
                     cout<<"\nEnter the name :: ";
                     char name[20];
                     cin>>name;
                     outfile<<name<<endl;
                     cout<<"\nEnter Father's name :: ";
                     char fname[25];
                     cin>>fname;
                     outfile<<fname<<endl;
                     totrec= totrec + 1;
                     outfile.close();
                }
                 break;

          case 2 :
                {
                     ofstream outfile;
                     outfile.open("C:\\Users\\ranja\\Documents\\file4.txt",ios::app);
                     cout<<"\n\nPlease Enter Details :: \n";
                      cout<<"\nEnter Roll No. :: ";
                     int roll;
                     cin>>roll;
                     outfile<<roll<<endl;
                     cout<<"\nEnter the name :: ";
                     char name[20];
                     cin>>name;
                     outfile<<name<<endl;
                     cout<<"\nEnter Father's name :: ";
                     char fname[25];
                     cin>>fname;
                     outfile<<fname<<endl;
                     totrec= totrec + 1;
                     outfile.close();
                 }
                 break;
          
          case 3 :
                {
                     ifstream infile;
                     infile.open("C:\\Users\\ranja\\Documents\\file4.txt",ios::in);
                     const int size=80;
                     char line[size];
                     int counter=totrec;
                     while(counter > 0)
                     {
                     infile.getline(line,size);
                     cout<<"\n\nROLL NO     : "<<line<<endl;
                     infile.getline(line,size);
                     cout<<"NAME      : "<<line<<endl;
                     infile.getline(line,size);
                     cout<<"FATHER'S NAME : "<<line<<endl;
                     counter--;
                     }
                     infile.close();
                }
                    break;

         case 4  :
                exit(0);

          default :
                cout<<"\nInvalid Choice\nTRY AGAIN.......\n";
          }
    }
    return 0;
}