export class Profile {
  apps: Apps[];
}
export class Apps {
  common: Common;
  skills: Skills[];
}
export class Common {
  enableSkill: boolean;
  name: string;
  profession: string;
}
export class Skills {
  skills: string[]
}